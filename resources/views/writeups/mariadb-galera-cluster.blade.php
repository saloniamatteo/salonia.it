@use('App\Helpers\Url')
@include('static/head', [
    "lang"  => app()->getLocale(),
    "title" => __("writeups.mgc.title"),
    "desc"  => __("writeups.mgc.desc"),
	"highlight" => 1,
])

<body>
@include('static/header')

<!-- MariaDB + Galera Cluster -->
<x-hero class="mt-4" id="mariadb-galera-cluster"
		img="writeups/mgc.webp" alt="{{ __('writeups.mgc.title') }}">

	<x-slot:title>
		{{ __("writeups.mgc.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("writeups.mgc.desc") }}
	</x-slot>

	<x-card class="m-3">
		<!-- Step 1 -->
		<x-tag-md id="s1">{{ __("writeups.mgc.s1.title") }}</x-tag-md>

		<p class="mt-0">
			{!! __("writeups.mgc.s1.desc") !!}
		</p>

		<x-code lang="/etc/hosts">
100.0.1.10 db1
100.0.1.11 db2
100.0.1.12 db3
		</x-code>

		<p class="mt-0">
			{!! __("writeups.mgc.s1.desc2") !!}
		</p>

		<x-card-info>
			{!! __("writeups.mgc.s1.note") !!}

			<x-code lang="/etc/hosts">
fe80::1 db1
fe80::2 db2
fe80::2 db3
			</x-code>
		</x-card-info>

		<!-- Step 2 -->
		<x-tag-md id="s2">{{ __("writeups.mgc.s2.title") }}</x-tag-md>

		<ul class="mt-0">
			<li>
				Debian:

				<x-code lang="Bash">
sudo apt install mariadb-server galera-4
				</x-code>
			</li>

			<li>
				Centos/Fedora/RHEL:

				<x-code lang="Bash">
sudo yum install mariadb-server mariadb-server-galera
				</x-code>
			</li>

			<li>
				Gentoo:

				<x-code lang="Bash">
sudo emerge dev-db/mariadb sys-cluster/galera
				</x-code>
			</li>
		</ul>

		<!-- Step 3 -->
		<x-tag-md id="s3">{{ __("writeups.mgc.s3.title") }}</x-tag-md>

		<div class="mt-1"></div>

		<x-card-info>
			{!! __("writeups.mgc.s3.note") !!}

			<x-code lang="ini">
# bind-address = 0.0.0.0
			</x-code>
		</x-card-info>

		<p>
			{!! __("writeups.mgc.s3.desc") !!}
		</p>

		<x-code lang="Bash">
			mysql -u root -p
		</x-code>

		<x-code lang="SQL">
CREATE USER '<strong>replication</strong>' IDENTIFIED BY '<strong>password</strong>';
GRANT ALL PRIVILEGES ON TO '<strong>replication</strong>';
FLUSH PRIVILEGES;
		</x-code>

		<p>{!! __("writeups.mgc.s3.desc2") !!}</p>

		<x-code lang="ini">
# Debian: [galera]
# RHEL: [mysqld]

[galera]
binlog_format            = row
default-storage-engine   = innodb
innodb_autoinc_lock_mode = 2

# Galera Provider
wsrep_on = ON
wsrep_provider = /usr/lib/galera/libgalera_smm.so

# Cluster
wsrep_cluster_name    = "MariaDB Galera Cluster"
wsrep_cluster_address = "gcomm://<strong>db1,db2,db3</strong>"
wsrep_sst_method      = rsync
wsrep_sst_auth        = <strong>replication:passwd</strong>

# This node's config
bind-address                = <strong>db1</strong>
wsrep_node_name             = "<strong>db1</strong>"
wsrep_node_address          = "<strong>db1</strong>"
wsrep_node_receive_address  = "<strong>db1</strong>"
wsrep_node_incoming_address = "<strong>db1</strong>"
		</x-code>

		<p>{!! __("writeups.mgc.s3.desc3") !!}</p>

		<x-code lang="Bash">
systemctl stop mariadb
galera_new_cluster
		</x-code>

		<!-- Step 4 -->
		<x-tag-md id="s4">{{ __("writeups.mgc.s4.title") }}</x-tag-md>

		<p class="mt-0">{!! __("writeups.mgc.s4.desc") !!}</p>

		<p>{!! __("writeups.mgc.s4.desc2") !!}</p>

		<x-code lang="ini">
# Debian: [galera]
# RHEL: [mysqld]

[galera]
binlog_format            = row
default-storage-engine   = innodb
innodb_autoinc_lock_mode = 2

# Galera Provider
wsrep_on = ON
wsrep_provider = /usr/lib/galera/libgalera_smm.so

# Cluster
wsrep_cluster_name    = "MariaDB Galera Cluster"
wsrep_cluster_address = "gcomm://<strong>db1,db2,db3</strong>"
wsrep_sst_method      = rsync
wsrep_sst_auth        = <strong>replication:passwd</strong>

# This node's config
bind-address                = <strong>db2</strong>
wsrep_node_name             = "<strong>db2</strong>"
wsrep_node_address          = "<strong>db2</strong>"
wsrep_node_receive_address  = "<strong>db2</strong>"
wsrep_node_incoming_address = "<strong>db2</strong>"
		</x-code>

		<p>{{ __("writeups.mgc.s4.desc3") }}</p>

		<x-code lang="Bash">
systemctl start mariadb
		</x-code>

		<!-- Step 5 -->
		<x-tag-md id="s5">{{ __("writeups.mgc.s5.title") }}</x-tag-md>

		<p class="mt-0">{!! __("writeups.mgc.s5.desc") !!}</p>

		<ul>
			<li>
				<code>3306</code> (TCP):&nbsp;
				MySQL Client Connections & State Snapshot Transfer (mysqldump)
			</li>

			<li>
				<code>4567</code> (TCP/UDP):&nbsp;
				Galera Cluster Replication
			</li>

			<li>
				<code>4568</code> (TCP):&nbsp;
				Incremental State Transfer
			</li>

			<li>
				<code>4444</code> (TCP):&nbsp;
				State Snapshot Transfers
			</li>
		</ul>

		<p>
		CentOS/Fedora/RHEL (firewalld):
		</p>

		<x-code lang="Bash">
firewall-cmd --zone=public --add-port=3306/tcp --permanent
firewall-cmd --zone=public --add-port=4567/tcp --permanent
firewall-cmd --zone=public --add-port=4567/udp --permanent
firewall-cmd --zone=public --add-port=4568/tcp --permanent
firewall-cmd --zone=public --add-port=4444/tcp --permanent
firewall-cmd --reload
		</x-code>

		<p>
		Debian (ufw):
		</p>

		<x-code lang="Bash">
ufw allow 3306,4567,4568,4444/tcp
ufw allow 4567/udp
		</x-code>

		<x-card-alert>
			{{ __("writeups.mgc.s5.warning") }}
		</x-card-alert>

		<!-- Step 6 -->
		<x-tag-md id="s6">{{ __("writeups.mgc.s6.title") }}</x-tag-md>

		<p class="mt-0">{!! __("writeups.mgc.s6.desc") !!}</p>

		<x-code lang="Bash">
mysql -e "SHOW STATUS LIKE 'wsrep_cluster_size'"
		</x-code>

		<p>{!! __("writeups.mgc.s6.desc2") !!}</p>

		<x-code>
+--------------------+-------+
| Variable_name      | Value |
+--------------------+-------+
| wsrep_cluster_size | 3     |
+--------------------+-------+
		</x-code>

		<p>{!! __("writeups.mgc.s6.desc3") !!}</p>

		<x-code lang="Bash">
mysql -u root -p
		</x-code>

		<x-code lang="SQL">
CREATE DATABASE testdb;
CREATE TABLE testdb.msg (
    'id' INT NOT NULL AUTO_INCREMENT,
    'message' VARCHAR(255) NOT NULL,
    PRIMARY KEY ('id')
);
INSERT INTO testdb.msg ('id', 'message') VALUES (1, 'AAA');
INSERT INTO testdb.msg ('id', 'message') VALUES (2, 'BBB');
INSERT INTO testdb.msg ('id', 'message') VALUES (3, 'CCC');
		</x-code>

		<p>{!! __("writeups.mgc.s6.desc4") !!}</p>

		<x-code lang="Bash">
mysql -e "SELECT * FROM testdb.msg"
		</x-code>

		<!-- Step 7 -->
		<x-tag-md id="s7">{{ __("writeups.mgc.s7.title") }}</x-tag-md>

		<p class="mt-0">{!! __("writeups.mgc.s7.desc") !!}</p>

		<x-code lang="nginx.conf">
stream {
	upstream cluster {
		zone tcp_servers 64k;
		server db1:3306;
		server db2:3306;
		server db3:3306;
	}

	# NOTE: change this port if you already have
	# mariadb/mysql running on this host
	server {
		# required: nginx >=1.25.5
		# https://nginx.org/en/docs/stream/ngx_stream_core_module.html#server_name
		# server_name db.internal.example.com;
		listen 3306;
		proxy_pass cluster;
		proxy_connect_timeout 3s;
	}
}
		</x-code>
	</x-card>
	@include('static/home')
</x-hero>

@include('static/footer')
</body>
</html>

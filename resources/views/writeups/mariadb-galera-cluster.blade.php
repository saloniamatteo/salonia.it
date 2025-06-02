@use('App\Helpers\Url')
@include('static/head', [
    "lang"  => app()->getLocale(),
    "title" => __("writeups.mariadb-galera-cluster.title"),
    "desc"  => __("writeups.mariadb-galera-cluster.desc"),
])

<body>
@include('static/header')

<!-- MariaDB + Galera Cluster -->
<x-hero class="mt-4" id="mariadb-galera-cluster">
	<x-slot:title>
		{{ __("writeups.mariadb-galera-cluster.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("writeups.mariadb-galera-cluster.desc") }}
	</x-slot>

	<x-card class="m-3">
		<!-- Step 1 -->
		<x-tag-md id="s1">{{ __("writeups.mariadb-galera-cluster.s1.title") }}</x-tag-md>

		<p class="mt-0">
			{!! __("writeups.mariadb-galera-cluster.s1.desc") !!}
		</p>

		<p>
			<pre>
			<code data-lang="/etc/hosts">
			100.0.1.10 db1<br>
			100.0.1.11 db2<br>
			100.0.1.12 db3
			</code>
			</pre>
		</p>

		<p class="mt-0">
			{!! __("writeups.mariadb-galera-cluster.s1.desc2") !!}
		</p>

		<x-card-info>
			{!! __("writeups.mariadb-galera-cluster.s1.note") !!}

		<p>
			<pre>
			<code data-lang="/etc/hosts">
			fe80::1 db1<br>
			fe80::2 db2<br>
			fe80::2 db3
			</code>
			</pre>
		</p>
		</x-card-info>

		<!-- Step 2 -->
		<x-tag-md id="s2">{{ __("writeups.mariadb-galera-cluster.s2.title") }}</x-tag-md>

		<ul class="mt-0">
			<li>
				Debian:

				<pre class="my-1">
				<code>
				apt install mariadb-server galera-4
				</code>
				</pre>
			</li>

			<li>
				Centos/Fedora/RHEL:

				<pre class="my-1">
				<code>
				yum install mariadb-server mariadb-server-galera
				</code>
				</pre>
			</li>

			<li>
				Gentoo:

				<pre class="my-1">
				<code>
				emerge dev-db/mariadb sys-cluster/galera
				</code>
				</pre>
			</li>
		</ul>

		<!-- Step 3 -->
		<x-tag-md id="s3">{{ __("writeups.mariadb-galera-cluster.s3.title") }}</x-tag-md>

		<div class="mt-1"></div>

		<x-card-info>
			{!! __("writeups.mariadb-galera-cluster.s3.note") !!}

			<p>
				<pre>
				<code>
				# bind-address = 0.0.0.0
				</code>
				</pre>
			</p>
		</x-card-info>

		<p>{!! __("writeups.mariadb-galera-cluster.s3.desc") !!}</p>

		<p>
			<pre>
			<code data-lang="Bash">
			mysql -u root -p
			</code>
			</pre>
		</p>

		<p>
			<pre>
			<code data-lang="SQL">
			CREATE USER '<strong>replication</strong>' IDENTIFIED BY '<strong>password</strong>';<br>
			GRANT ALL PRIVILEGES ON TO '<strong>replication</strong>';<br>
			FLUSH PRIVILEGES;
			</code>
			</pre>
		</p>

		<p>{!! __("writeups.mariadb-galera-cluster.s3.desc2") !!}</p>

		<p>
			<pre>
			<code>
			# Debian: [galera]<br>
			# RHEL: [mysqld]<br>
<br>
			[galera]<br>
			binlog_format            = row<br>
			default-storage-engine   = innodb<br>
			innodb_autoinc_lock_mode = 2<br>
<br>
			# Galera Provider<br>
			wsrep_on = ON<br>
			wsrep_provider = /usr/lib/galera/libgalera_smm.so<br>
<br>
			# Cluster <br>
			wsrep_cluster_name    = "MariaDB Galera Cluster"<br>
			wsrep_cluster_address = "gcomm://<strong>db1,db2,db3</strong>"<br>
			wsrep_sst_method      = rsync<br>
			wsrep_sst_auth        = <strong>replication:passwd</strong><br>
<br>
			# This node's config<br>
			bind-address                = <strong>db1</strong><br>
			wsrep_node_name             = "<strong>db1</strong>"<br>
			wsrep_node_address          = "<strong>db1</strong>"<br>
			wsrep_node_receive_address  = "<strong>db1</strong>"<br>
			wsrep_node_incoming_address = "<strong>db1</strong>"
			</code>
			</pre>
		</p>

		<p>{!! __("writeups.mariadb-galera-cluster.s3.desc3") !!}</p>

		<p>
			<pre>
			<code data-lang="Bash">
			systemctl stop mariadb<br>
			galera_new_cluster
			</code>
			</pre>
		</p>

		<!-- Step 4 -->
		<x-tag-md id="s4">{{ __("writeups.mariadb-galera-cluster.s4.title") }}</x-tag-md>

		<p class="mt-0">{!! __("writeups.mariadb-galera-cluster.s4.desc") !!}</p>

		<p>{!! __("writeups.mariadb-galera-cluster.s4.desc2") !!}</p>

		<p>
			<pre>
			<code>
			# Debian: [galera]<br>
			# RHEL: [mysqld]<br>
<br>
			[galera]<br>
			binlog_format            = row<br>
			default-storage-engine   = innodb<br>
			innodb_autoinc_lock_mode = 2<br>
<br>
			# Galera Provider<br>
			wsrep_on = ON<br>
			wsrep_provider = /usr/lib/galera/libgalera_smm.so<br>
<br>
			# Cluster <br>
			wsrep_cluster_name    = "MariaDB Galera Cluster"<br>
			wsrep_cluster_address = "gcomm://<strong>db1,db2,db3</strong>"<br>
			wsrep_sst_method      = rsync<br>
			wsrep_sst_auth        = <strong>replication:passwd</strong><br>
<br>
			# This node's config<br>
			bind-address                = <strong>db2</strong><br>
			wsrep_node_name             = "<strong>db2</strong>"<br>
			wsrep_node_address          = "<strong>db2</strong>"<br>
			wsrep_node_receive_address  = "<strong>db2</strong>"<br>
			wsrep_node_incoming_address = "<strong>db2</strong>"
			</code>
			</pre>
		</p>

		<p>{{ __("writeups.mariadb-galera-cluster.s4.desc3") }}</p>

		<p>
			<pre>
			<code data-lang="Bash">
			systemctl start mariadb
			</code>
			</pre>
		</p>

		<!-- Step 5 -->
		<x-tag-md id="s5">{{ __("writeups.mariadb-galera-cluster.s5.title") }}</x-tag-md>

		<p class="mt-0">{!! __("writeups.mariadb-galera-cluster.s5.desc") !!}</p>

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

		<p>
			<pre>
			<code data-lang="Bash">
			firewall-cmd --zone=public --add-port=3306/tcp --permanent<br>
			firewall-cmd --zone=public --add-port=4567/tcp --permanent<br>
			firewall-cmd --zone=public --add-port=4567/udp --permanent<br>
			firewall-cmd --zone=public --add-port=4568/tcp --permanent<br>
			firewall-cmd --zone=public --add-port=4444/tcp --permanent<br>
			firewall-cmd --reload
			</code>
			</pre>
		</p>

		<p>
		Debian (ufw):
		</p>

		<p>
			<pre>
			<code data-lang="Bash">
			ufw allow 3306,4567,4568,4444/tcp<br>
			ufw allow 4567/udp
			</code>
			</pre>
		</p>

		<x-card-alert>
			{{ __("writeups.mariadb-galera-cluster.s5.warning") }}
		</x-card-alert>

		<!-- Step 6 -->
		<x-tag-md id="s6">{{ __("writeups.mariadb-galera-cluster.s6.title") }}</x-tag-md>

		<p class="mt-0">{!! __("writeups.mariadb-galera-cluster.s6.desc") !!}</p>

		<p>
			<pre>
			<code data-lang="Bash">
			mysql -e "SHOW STATUS LIKE 'wsrep_cluster_size'"
			</code>
			</pre>
		</p>

		<p>{!! __("writeups.mariadb-galera-cluster.s6.desc2") !!}</p>

		<p>
			<pre>
			<code>
			+--------------------+-------+<br>
			| Variable_name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| Value |<br>
			+--------------------+-------+<br>
			| wsrep_cluster_size | 3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<br>
			+--------------------+-------+
			</code>
			</pre>
		</p>

		<p>{!! __("writeups.mariadb-galera-cluster.s6.desc3") !!}</p>

		<p>
			<pre>
			<code data-lang="Bash">
			mysql -u root -p
			</code>
			</pre>
		</p>

		<p>
			<pre>
			<code data-lang="SQL">
			CREATE DATABASE testdb;<br>
			CREATE TABLE testdb.msg (<br>
			&nbsp;&nbsp;'id' INT NOT NULL AUTO_INCREMENT,<br>
			&nbsp;&nbsp;'message' VARCHAR(255) NOT NULL,<br>
			&nbsp;&nbsp;PRIMARY KEY ('id')<br>
			);<br>
			INSERT INTO testdb.msg ('id', 'message') VALUES (1, 'AAA');<br>
			INSERT INTO testdb.msg ('id', 'message') VALUES (2, 'BBB');<br>
			INSERT INTO testdb.msg ('id', 'message') VALUES (3, 'CCC');
			</code>
			</pre>
		</p>

		<p>{!! __("writeups.mariadb-galera-cluster.s6.desc4") !!}</p>

		<p>
			<pre>
			<code data-lang="Bash">
			mysql -e "SELECT * FROM testdb.msg"
			</code>
			</pre>
		</p>

		<!-- Step 7 -->
		<x-tag-md id="s7">{{ __("writeups.mariadb-galera-cluster.s7.title") }}</x-tag-md>

		<p class="mt-0">{!! __("writeups.mariadb-galera-cluster.s7.desc") !!}</p>

		<p>
			<pre>
			<code>
			stream {<br>
			&nbsp;&nbsp;upstream cluster {<br>
			&nbsp;&nbsp;&nbsp;&nbsp;zone tcp_servers 64k;<br>
			&nbsp;&nbsp;&nbsp;&nbsp;server db1:3306;<br>
			&nbsp;&nbsp;&nbsp;&nbsp;server db2:3306;<br>
			&nbsp;&nbsp;&nbsp;&nbsp;server db3:3306;<br>
			&nbsp;&nbsp;}<br>
<br>
			&nbsp;&nbsp;# NOTE: change this port if you already have<br>
			&nbsp;&nbsp;# mariadb/mysql running on this host<br>
			&nbsp;&nbsp;server {<br>
			&nbsp;&nbsp;&nbsp;&nbsp;# required: nginx >=1.25.5<br>
			&nbsp;&nbsp;&nbsp;&nbsp;# https://nginx.org/en/docs/stream/ngx_stream_core_module.html#server_name<br>
			&nbsp;&nbsp;&nbsp;&nbsp;# server_name db.internal.example.com;<br>
			&nbsp;&nbsp;&nbsp;&nbsp;listen 3306;<br>
			&nbsp;&nbsp;&nbsp;&nbsp;proxy_pass cluster;<br>
			&nbsp;&nbsp;&nbsp;&nbsp;proxy_connect_timeout 3s;<br>
			&nbsp;&nbsp;}<br>
			}
			</code>
			</pre>
		</p>
	</x-card>
	@include('static/home')
</x-hero>

@include('static/footer')
</body>
</html>

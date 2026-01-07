@use('App\Helpers\Url')
@include('static/head', [
    "lang"  => app()->getLocale(),
    "title" => __("writeups.k8s.title"),
    "desc"  => __("writeups.k8s.desc"),
	"highlight" => 1,
])

<body>
@include('static/header')

<!-- Kubernetes -->
<x-hero class="mt-4" id="kubernetes"
		img="writeups/k8s.webp" alt="{{ __('writeups.k8s.title') }}">

	<x-slot:title>
		{{ __("writeups.k8s.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("writeups.k8s.desc") }}
	</x-slot>

	<x-card class="m-3">
		<!-- Step 1 -->
		<x-tag-md id="s1">{{ __("writeups.k8s.s1.title") }}</x-tag-md>

		<p class="my-0">
			{!! __("writeups.k8s.s1.desc", [
				'req1' => '<a class="text-blue-700 u u-LR" '
						  . 'href="https://kubernetes.io/docs/setup/'
						  . 'production-environment/tools/kubeadm/'
						  . 'install-kubeadm/#before-you-begin">',

				'req2' => '</a>'
			]) !!}
		</p>

		<ul class="mt-0">
			<li>RAM: &gt;2GB {{ __('writeups.k8s.s1.req.node') }}</li>
			<li>CPU: &gt;2 core (Control plane)</li>
			<li>{{ __('writeups.k8s.s1.req.hostname') }}</li>
			<li>
				{!! __('writeups.k8s.s1.req.ports', [
					'req1' => '<a class="text-blue-700 u u-LR" '
							  . 'href="https://kubernetes.io/docs/reference/'
							  . 'networking/ports-and-protocols">',

					'req2' => '</a>',
				]) !!}
			</li>
		</ul>

		<!-- Step 2 -->
		<x-tag-md id="s2">{{ __("writeups.k8s.s2.title") }}</x-tag-md>

		<p class="mt-0">
			{!! __("writeups.k8s.s2.desc", [
				'req1' => '<a class="text-blue-700 u u-LR" '
						  . 'href="https://kubernetes.io/docs/setup/'
						  . 'production-environment/tools/kubeadm/'
						  . 'install-kubeadm/#swap-configuration">',

			    'req2' => '</a>',
			]) !!}
		</p>

		<x-code lang="Bash">
			swapoff -a
		</x-code>

		<p>
			{!! __('writeups.k8s.s2.desc2', [
				'file' => '<code>/etc/fstab</code>',
				'swap' => '<code>swap</code>',
			]) !!}
		</p>

		<x-code lang="/etc/fstab">
# COMMENT THE LINE THAT CONTAINS 'swap'
#                 vvvv
#/dev/sda3  none  swap  sw  0 0
		</x-code>

		<!-- Step 3 -->
		<x-tag-md id="s3">{{ __("writeups.k8s.s3.title") }}</x-tag-md>

		<p class="mt-0">
			{{ __("writeups.k8s.s3.desc") }}
		</p>

		<x-code lang="Bash">
# Load modules
sudo modprobe overlay
sudo modprobe br_netfilter

# Permanently save changes
cat &lt;&lt;EOF | sudo tee /etc/modules-load.d/containerd.conf
overlay
br_netfilter
EOF

# Tweak sysctl
cat &lt;&lt;EOF | sudo tee /etc/sysctl.d/99-kubernetes-cri.conf
# enables bridged traffic to pass through iptables,
# crucial for routing between nodes and pods
net.bridge.bridge-nf-call-iptables = 1
# allows IP forwarding for pod-to-pod communication across node interfaces
net.ipv4.ip_forward = 1
# manages IPv6 traffic on bridged interfaces through ip6tables, important for IPv6 networking environments
net.bridge.bridge-nf-call-ip6tables = 1
EOF

# Load sysctl tweaks
sudo sysctl --system
		</x-code>

		<!-- Step 4 -->
		<x-tag-md id="s4">{{ __("writeups.k8s.s4.title") }}</x-tag-md>

		<p class="my-0">
			{{ __("writeups.k8s.s4.desc") }}
		</p>

		<ul class="mt-0">
			<li>
				<strong>Control Plane</strong>:

				<ul>
					<li>
						<code>6443</code> (TCP):&nbsp;
						Kubernetes API Server
					</li>

					<li>
						<code>2379-2380</code> (TCP):&nbsp;
						etc server client API
					</li>

					<li>
						<code>10250</code> (TCP):&nbsp;
						Kubelet API
					</li>

					<li>
						<code>10257</code> (TCP):&nbsp;
						kube-controller-manager
					</li>

					<li>
						<code>10259</code> (TCP):&nbsp;
						kube-scheduler
					</li>
				</ul>
			</li>

			<li>
				<strong>{{ __('writeups.k8s.s4.worker') }}</strong>:

				<ul>
					<li>
						<code>10250</code> (TCP):&nbsp;
						Kubelet API
					</li>

					<li>
						<code>10256</code> (TCP):&nbsp;
						kube-proxy
					</li>

					<li>
						<code>30000-32767</code> (TCP/UDP):&nbsp;
						NodePort Services
					</li>
				</ul>
			</li>
		</ul>

		<p>
		CentOS/Fedora/RHEL (firewalld):
		</p>

		<x-code lang="Bash">
# Control Plane
firewall-cmd --zone=public --add-port=6443/tcp --permanent
firewall-cmd --zone=public --add-port=2379-2380/tcp --permanent
firewall-cmd --zone=public --add-port=10250/tcp --permanent
firewall-cmd --zone=public --add-port=10257/tcp --permanent
firewall-cmd --zone=public --add-port=10259/tcp --permanent
firewall-cmd --reload

# Worker Nodes
firewall-cmd --zone=public --add-port=10250/tcp --permanent
firewall-cmd --zone=public --add-port=10256/tcp --permanent
firewall-cmd --zone=public --add-port=30000-32767/tcp --permanent
firewall-cmd --zone=public --add-port=30000-32767/udp --permanent
firewall-cmd --reload
		</x-code>

		<p>
		Debian (ufw):
		</p>

		<x-code lang="Bash">
# Control Plane
ufw allow 6443,2379:2380,10250,10257,10259/tcp

# Worker Nodes
ufw allow 10250,10256,30000:32767/tcp
ufw allow 30000:32767/udp
		</x-code>

		<x-card-alert>
			{{ __("writeups.k8s.s4.warning") }}
		</x-card-alert>

		<!-- Step 5 -->
		<x-tag-md id="s5">{{ __("writeups.k8s.s5.title") }}</x-tag-md>

		<ul>
			<li>
				CentOS/Fedora/RHEL:&nbsp;

				<x-code lang="Bash">
# Set SELinux to permissive mode for ease of troubleshooting
sudo setenforce 0
sudo sed -i --follow-symlinks 's/SELINUX=enforcing/SELINUX=permissive/g' /etc/sysconfig/selinux

# Add containerd repo & install it
sudo dnf config-manager --add-repo https://download.docker.com/linux/centos/docker-ce.repo
sudo dnf install containerd.io -y

# Add kubernetes repo
cat &lt;&lt;EOF | sudo tee /etc/yum.repos.d/kubernetes.repo
[kubernetes]
name=Kubernetes
baseurl=https://pkgs.k8s.io/core:/stable:/v1.33/rpm/
enabled=1
gpgcheck=1
gpgkey=https://pkgs.k8s.io/core:/stable:/v1.33/rpm/repodata/repomd.xml.key
exclude=kubelet kubeadm kubectl cri-tools kubernetes-cni
EOF

# Install Kubernetes
sudo dnf install -y kubelet kubeadm kubectl --disableexcludes=kubernetes
				</x-code>
			</li>

			<li>
				Debian:&nbsp;

				<x-code lang="Bash">
# Update repos
sudo apt update

# Install required packages
sudo apt install -y apt-transport-https ca-certificates curl gpg

# Copy Kubernetes gpg key for apt
curl -fsSL https://pkgs.k8s.io/core:/stable:/v1.33/deb/Release.key | sudo gpg --dearmor -o /etc/apt/keyrings/kubernetes-apt-keyring.gpg

# Add Kubernetes repository
echo 'deb [signed-by=/etc/apt/keyrings/kubernetes-apt-keyring.gpg] https://pkgs.k8s.io/core:/stable:/v1.33/deb/ /' | sudo tee /etc/apt/sources.list.d/kubernetes.list

# Update repos

# Install Kubernetes & other packages
sudo apt install docker-cli containerd kubectl kubeadm kubelet
				</x-code>
			</li>

			<li>
				Gentoo:&nbsp;

				<x-code lang="Bash">
# Control Plane
doas emerge -a app-containers/{containerd,cri-o} sys-cluster/kube-{apiserver,controller-manager,proxy,scheduler} sys-cluster/kube{adm,ctl,let,letctl}

# Worker Nodes
sudo emerge -a app-containers/{containerd,cri-o} sys-cluster/kube{let,-proxy}
				</x-code>
			</li>
		</ul>

		<!-- Step 6 -->
		<x-tag-md id="s6">{{ __("writeups.k8s.s6.title") }}</x-tag-md>

		<x-code lang="Bash">
# Containerd
sudo mkdir -p /etc/containerd
containerd config default | sudo tee /etc/containerd/config.toml

# Gentoo users: do not run if you don't use systemd
sudo sed -i 's/SystemdCgroup = false/SystemdCgroup = true/g' /etc/containerd/config.toml
sudo systemctl restart containerd

# Configure crictl (cri-o)
cat &lt;&lt;EOF | sudo tee /etc/crictl.yaml
runtime-endpoint: unix:///run/containerd/containerd.sock
image-endpoint: unix:///run/containerd/containerd.sock
timeout: 3
EOF
		</x-code>

		<!-- Step 7 -->
		<x-tag-md id="s7">{{ __("writeups.k8s.s7.title") }}</x-tag-md>

		<x-code lang="Bash">
# Systemd users (Debian, CentOS, Fedora, RHEL, ...)
sudo systemctl enable --now containerd
sudo systemctl enable --now kubelet

# Gentoo users (OpenRC)
sudo rc-update add containerd default
sudo rc-update add kubelet default
sudo rc-service containerd start
# Note: do not run the line below on the control plane.
# If the control plane also acts as a worker (2-node cluster),
# enable the 'kubelet' service only after creating the cluster.
sudo rc-service kubelet start
		</x-code>

		<!-- Step 8 -->
		<x-tag-md id="s8">{{ __("writeups.k8s.s8.title") }}</x-tag-md>

		<p class="mt-0">
			{!! __("writeups.k8s.s8.desc", [
				'range' => '<code>10.88.0.0/16</code>',
			]) !!}
		</p>

		<x-code lang="Bash">
sudo kubeadm init --pod-network-cidr 10.88.0.0/16
		</x-code>

		<x-card-info>
			{{ __('writeups.k8s.s8.info') }}

			<x-code lang="Bash">
sudo systemctl stop kubelet
sudo kubeadm reset
sudo rm -rf /etc/kubernetes /var/lib/etc $HOME/.kube
sudo pkill -9 "kube*"
			</x-code>

			{{ __('writeups.k8s.s8.info2') }}

			<x-code lang="Bash">
sudo systemctl start kubelet
			</x-code>
		</x-card-info>

		<p>
			{{ __('writeups.k8s.s8.desc2') }}
		</p>

		<x-code lang="Bash">
sudo kubeadm join <span class="hljs-literal">CONTROL-PLANE-IP</span>:6443 \
--token <u>TOKEN</u> \
--discovery-token-ca-cert-hash sha256:<u>HASH</u>
		</x-code>

		<p>
			{!! __('writeups.k8s.s8.desc3', [
				'b' => '<strong>',
				'eb' => '</strong>'
			]) !!}
		</p>

		<p>
			{{ __('writeups.k8s.s8.desc4') }}
		</p>

		<x-code lang="Bash">
mkdir -p $HOME/.kube
sudo cp -i /etc/kubernetes/admin.conf $HOME/.kube/config
sudo chown $(id -u):$(id -g) $HOME/.kube/config
		</x-code>

		<p>
			{{ __('writeups.k8s.s8.desc5') }}
		</p>

		<x-code lang="Bash">
kubectl get nodes
		</x-code>

		<p>
			{{ __('writeups.k8s.s8.desc6', [
				'x' => '<b>Ready</b>',
			]) }}
		</p>

		<x-table nofoot="1">
			<x-slot:head>
				<th>NAME</th>
				<th>STATUS</th>
				<th>ROLES</th>
				<th>AGE</th>
				<th>VERSION</th>
			</x-slot>

			<x-slot:body>
				<tr>
					<td>ControlPlane</td>
					<td>Ready</td>
					<td>control-plane</td>
					<td>1m</td>
					<td>v1.33.1</td>
				</tr>

				@for ($i = 1; $i <= 3; $i++)
					<tr>
						<td>Worker{{ $i }}</td>
						<td>Ready</td>
						<td>&lt;none&gt;</td>
						<td>1m</td>
						<td>v1.33.1</td>
					</tr>
				@endfor
			</x-slot>
		</x-table>

		<x-card-info>
			{!! __('writeups.k8s.s8.info3', [
				'ready' => '<code>Ready</code>',
			]) !!}
		</x-card-info>

		<!-- Step 9 -->
		<x-tag-md id="s9">{{ __('writeups.k8s.s9.title') }}</x-tag-md>

		<p class="my-0">
			{{ __('writeups.k8s.s9.desc') }}
		</p>

		<x-code lang="Bash">
# Setup tigera operator
kubectl create -f https://raw.githubusercontent.com/projectcalico/calico/master/manifests/tigera-operator.yaml

# Download custom resources file
curl https://raw.githubusercontent.com/projectcalico/calico/master/manifests/custom-resources.yaml -O

# Replace default network '192.168.0.0/16' with '10.88.0.0/16'
sed -i "s/192.168.0.0\/16/10.88.0.0\/16/" custom-resources.yaml

# Create custom resources
kubectl create -f custom-resources.yaml
		</x-code>

		<!-- Step 10 -->
		<x-tag-md id="s10">{{ __('writeups.k8s.s10.title') }}</x-tag-md>

		<p class="my-0">
			{{ __('writeups.k8s.s10.desc') }}
		</p>

		<p>
			{{ __('writeups.k8s.s10.desc2') }}
		</p>

		<x-code lang="Bash">
kubectl create namespace test
		</x-code>

		<p>
			{!! __('writeups.k8s.s10.desc3', [
				'file' => '<code>nginx.yaml</code>',
			]) !!}
		</p>

		<x-code lang="YAML">
apiVersion: v1
kind: ConfigMap
metadata:
  name: nginx
  namespace: test
data:
  nginx.conf: |
    worker_processes auto;

    events {
        worker_connections 1024;
    }

    http {
        include       mime.types;
        default_type  application/octet-stream;

        server {
            listen       80;
            server_name  _;

            location / {
              # Return public IP
              resolver 1.1.1.1;
              resolver_timeout 5s;
              proxy_pass https://ifconfig.me/ip;
            }
        }
    }

---
apiVersion: apps/v1
kind: DaemonSet
metadata:
  name: nginx
  namespace: test
spec:
  selector:
    matchLabels:
      app: nginx
  template:
    metadata:
      labels:
        app: nginx
    spec:
      containers:
      - name: nginx
        image: nginx
        ports:
          - containerPort: 80
        volumeMounts:
        - name: nginx-config-volume
          mountPath: /etc/nginx/nginx.conf
          subPath: nginx.conf
      volumes:
      - name: nginx-config-volume
        configMap:
          name: nginx

---
apiVersion: v1
kind: Service
metadata:
  name: nginx
  namespace: test
spec:
  selector:
    app: nginx
  ports:
    - protocol: TCP
      port: 80
      targetPort: 80
      nodePort: 30000
  type: NodePort
		</x-code>

		<p>
			{{ __('writeups.k8s.s10.desc4') }}
		</p>

		<x-code lang="Bash">
kubectl apply -f nginx.yaml
		</x-code>

		<p>
			{{ __('writeups.k8s.s10.desc5') }}
		</p>

		<x-code lang="Bash">
watch kubectl get pods -n test
		</x-code>

		<p>
			{{ __('writeups.k8s.s10.desc6') }}
		</p>

		<x-code lang="Bash">
#!/bin/bash
IP=controlplane
PORT=30000

declare -A buffer

for i in {1..10}; do
    ip=$(curl http://$IP:$PORT 2>/dev/null)
    echo "IP: $ip"

    if [[ -v buffer["$ip"] ]]; then
        buffer["$ip"]=$((buffer["$ip"] + 1))
    else
        buffer["$ip"]=1
    fi
done

for ip in "${!buffer[@]}"; do
    seen=${buffer["$ip"]}
    echo "$ip seen $seen times"
done
		</x-code>

		<p>
			{{ __('writeups.k8s.s10.desc7') }}
		</p>

		<x-code>
100.0.10.11 seen 5 times
100.0.10.12 seen 5 times
		</x-code>

		<x-card-info>
			<p>
			{{ __('writeups.k8s.s10.info') }}
			</p>

			<p>
			{{ __('writeups.k8s.s10.info2') }}
			</p>

			<x-code>
100.0.10.11 seen 4 times
100.0.10.12 seen 6 times
			</x-code>

			<p>
			{{ __('writeups.k8s.s10.info3') }}
			</p>

			<x-code>
100.0.10.11 seen 6 times
100.0.10.12 seen 4 times
			</x-code>
		</x-card-info>

			<p>
			{{ __('writeups.k8s.s10.desc8') }}
			</p>

			<x-code lang="Bash">
kubectl delete -n test configmap/nginx daemonset.apps/nginx service/nginx
kubectl delete namespace test
			</x-code>
	</x-card>
	@include('static/home')
</x-hero>

@include('static/footer')
</body>
</html>

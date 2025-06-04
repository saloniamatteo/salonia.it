<?php

// English dict file for writeups
return [
    'title' => 'Writeups',
    'desc' => "Matteo Salonia's technical guides.",

    // MariaDB + Galera Cluster
    'mgc' => [
        'title' => 'MariaDB + Galera Cluster',
        'desc' => 'Highly available & distributed MySQL database with MariaDB '
                  . '& Galera Cluster. Supports auto failover.',

        // Step 1
        's1' => [
            'title' => '1. Gather your hosts',
            'desc' => 'In order to have a more flexible configuration, and not have '
                      . 'to remember IP addresses, modify <code>/etc/hosts</code> '
                      . 'and insert the following lines:',

            'desc2' => 'Modify each IP address & each hostname as you please.',

            'note' => 'It is (obviously) possible to add '
                      . '<strong>IPv6 addresses</strong>:',
        ],

        // Step 2
        's2' => [
            'title' => '2. Install MariaDB & Galera Cluster',
        ],

        // Step 3
        's3' => [
            'title' => '3. Configure the first node',
            'note' => 'Modify <code>/etc/mysql/mariadb.cnf.d/50-server.cnf</code> '
                      . '& make sure the following line is commented:',

            'desc' => 'Create the user that will be used for replication: '
                      . '(modify all bold parameters)',

            'desc2' => 'Modify <code>/etc/mysql/mariadb.cnf.d/60-galera.cnf</code>: '
                       . '(modify all bold parameters)',

            'desc3' => 'Create the cluster:',
        ],

        // Step 4
        's4' => [
            'title' => '4. Configuring the other nodes',
            'desc' => 'Now that the cluster has been configured on the first node, '
                      . 'you need to copy the configuration file to all other nodes,'
                      . ' making sure to modify the last 5 parameters, which '
                      . 'uniquely identify the node.',

            'desc2' => 'Example: configuration on a second node.',
            'desc3' => 'After configuring each node, you can start MariaDB:',
        ],

        // Step 5
        's5' => [
            'title' => '5. Configure the firewall',
            'desc' => 'Make sure to open the following ports:',
            'warning' => 'This is only an example config. It is highly recommended '
                         . 'you modify it so that only your nodes can communicate '
                         . 'on these ports.',
        ],

        // Step 6
        's6' => [
            'title' => '6. Configuration test',
            'desc' => 'Verify that your cluster has the right number of nodes with '
                      . 'the following command:',

            'desc2' => 'In this case, since we configured <strong>3 nodes</strong>, '
                       . 'the command will return the following:',

            'desc3' => "To be 100% certain that replication works, let's create a "
                       . 'DB and a test table on a node:',

            'desc4' => 'Execute this command on any other node:',
        ],

        // Step 7
        's7' => [
            'title' => '7. Load balancer with nginx',
            'desc' => "It's possible to optionally use nginx as a cluster "
                      . 'load balancer. Modify <code>/etc/nginx/nginx.conf</code> '
                      . 'and add the following config:',
        ]
    ],

    // SSH Passwordless login
    'spl' => [
        'title' => 'SSH Passwordless Login',
        'desc' => 'SSH Client & Server setup to login without passwords',

        // Client config
        'client' => [
            'desc' => 'Configure your SSH client in order to login without having '
                      . "to insert the remote user's password. Needed in "
                      . 'environments where password login is not allowed. ',

            // Step 1
            's1' => [
                'title' => '1. Generate keypair',
                'desc' => "It's necessary to create a keypair. "
                          . 'Run the following command to create a keypair '
                          . 'with <strong>RSA 4096</strong> cryptography:',

                'desc2' => "You'll have to insert the following parameters: ",

                'li' => [
                    'file' => [
                        'title' => 'File in which to save the key',
                        'desc' => 'Keep the default value (example: :path)',
                    ],

                    'password' => [
                        'title' => 'Password to use for the key',
                        'desc' => 'Insert a strong password. '
                                  . 'You can also use a blank password '
                                  . '(not recommended).',
                    ],
                ],
            ],

            // Step 2
            's2' => [
                'title' => '2. Configure .ssh/config',
                'desc' => 'The file <code>~/.ssh/config</code> contains all of '
                          . "your host's configurations, saving you from having "
                          . 'to type user & IP/hostname every time you want to '
                          . 'log onto a host. Modify this file with a text editor, '
                          . 'and insert the following: ',

                'desc2' => 'Set the bold parameters as follows:',

                'li' => [
                    'host' => 'The mnemonic name that will be used every time '
                              . 'you connect to the host. In this case: :cmd',

                    'user' => 'The remote user name.',

                    'hostname' => "The remote host's IP address or hostname. "
                                  . 'You can use an IP address (:ip), '
                                  . 'hostname (:hosts), '
                                  . 'or domain name (:domain).',
                ],
            ],

            // Step 3
            's3' => [
                'title' => "3. Copy the key to the host",
                'desc' => 'Run the following command: ',
                'desc2' => "Insert the remote user's password, and not your key's "
                           . 'password. If everything went well, running this '
                           . 'command will let you log onto the server:',

                'desc3' => "If you can't login to the server via ssh, but you can "
                           . "modify the disk's contents, you can copy your public "
                           . 'key on your server, inside the :file file, with the '
                           . 'following format: ',

                'desc4' => 'Where:',

                'li' => [
                    'ssh-rsa' => 'Key cryptography algorithm (RSA)',
                    'pkey' => 'Public key',
                    'host' => 'Optional; Helps to identify who owns the key',
                ],
            ],
        ],

        // Server config
        'server' => [
            'desc' => 'Configure your server so that only SSH keys can be used '
                      . 'for authentication. Also, disable root login for '
                      . 'better security.',

            // Step 1
            's1' => [
                'title' => '1. Modify /etc/ssh/sshd_config',
                'desc' => "Modify the ssh server's config "
                          . 'located in :path, and make sure these options '
                          . 'are set as follows: ',
            ],

            // Step 2
            's2' => [
                'title' => '2. Restart sshd',
                'desc' => 'Run the following command:',
                'desc2' => 'The ssh server will be restarted, and the new '
                           . 'configuration will be applied.',
            ],
        ],
    ],

    // Kubernetes
    'k8s' => [
        'title' => 'Kubernetes Cluster',
        'desc' => 'Kubernetes (k8s) Cluster with Control Plane & Worker Nodes',

        // Step 1
        's1' => [
            'title' => '1. Prerequisites',
            'desc' => "Kubernetes' :req1 requirements :req2 are as follows:",

            'req' => [
                'node' => 'for each node',
                'hostname' => 'Unique hostname for each node',
                'ports' => ':req1 Firewall ports open :req2',
            ],
        ],

        // Step 2
        's2' => [
            'title' => '2. Disable swap',
            'desc' => "You must :req1 disable swap:req2:",
            'desc2' => 'Also, modify :file, and comment out the line that '
                      . 'contains :swap. For example:',
        ],

        // Step 3
        's3' => [
            'title' => '3. Configure Kernel',
            'desc' => "It's necessary to modify some Kernel settings.",
        ],

        // Step 4
        's4' => [
            'title' => '4. Configure firewall',
            'desc' => 'Make sure to open the following ports:',
            'worker' => 'Worker Nodes',
            'warning' => 'This is only an example config. It is highly recommended '
                         . 'you modify it so that only your nodes can communicate '
                         . 'on these ports.',
        ],

        // Step 5
        's5' => [
            'title' => '5. Install packages',
        ],

        // Step 6
        's6' => [
            'title' => '6. Configure packages',
        ],

        // Step 7
        's7' => [
            'title' => '7. Start services',
        ],

        // Step 8
        's8' => [
            'title' => '8. Create cluster',
            'desc' => 'Create a cluster with IP addresses in the range :range:',
            'info' => 'If any problems arise, reset & delete the cluster '
                      . 'with all Kubernetes data with these commands:',

            'info2' => 'Start kubelet:',

            'desc2' => "Once the cluster has been created, you'll see "
                       . 'a command like this:',

            'desc3' => 'This command has to be executed on :b each worker node:eb '
                       . 'that you want to add to the cluster. Replace the '
                       . 'bold parameters with those retrieved from '
                       . 'the command output.',

            'desc4' => 'After creating the cluster, copy the configuration '
                       . 'into your home directory:',

            'desc5' => 'Verify the number of nodes in the cluster:',

            'desc6' => 'Example output:',

            'info3' => 'Each node tipically becomes :ready almost '
                       . 'immediately, or in less than 30 seconds '
                       . 'from its add/join date.',
        ],

        // Step 9
        's9' => [
            'title' => '9. Install Calico CNI',
            'desc' => 'Calico CNI (Container Network Interface) provides '
                      . 'network connectivity, security, and observability '
                      . 'for containerized applications. Install it '
                      . 'with these commands:',
        ],

        // Step 10
        's10' => [
            'title' => '10. Test environment',
            'desc' => 'Verify that the cluster, the Control Plane, '
                      . 'and the Worker Nodes work correctly. ',

            'desc2' => 'Create a test namespace:',
            'desc3' => 'Create a new file :file, modify it, '
                       . 'and add the following:',
            'desc4' => 'Apply the file:',
            'desc5' => 'Make sure the pods have been started:',
            'desc6' => 'Run the script below to check that '
                       . 'the load balancing functionality works as expected:',

            'desc7' => 'For example, if the cluster has 2 worker nodes, '
                       . 'you should see the following output:',

            'info' => 'Note that the ratio may not always be 50% for each node '
                       . '(requests_served / total_requests). '
                       . 'This is more than normal, as Kubernetes takes into '
                       . "account the system's load, as well as running "
                       . 'round-robin scheduling.',

            'info2' => 'This means that, for example, you could see:',
            'info3' => '...and immediately after:',

            'desc8' => "Remove the test environment:",
        ],
    ],
];

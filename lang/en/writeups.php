<?php

// English dict file for writeups
return [
    'title' => 'Writeups',
    'desc' => "Matteo Salonia's technical guides.",

    // MariaDB + Galera Cluster
    'mariadb-galera-cluster' => [
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
            'title' => '7. Load balancer config with nginx (optional)',
            'desc' => "It's possible to use nginx as a cluster load balancer. "
                      . 'Modify <code>/etc/nginx/nginx.conf</code> and add the'
                      . 'following config:',
        ]
    ],
];

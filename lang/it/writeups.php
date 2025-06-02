<?php

// Italian dict file for writeups
return [
    'title' => 'Writeups',
    'desc' => 'Le guide tecniche di Matteo Salonia.',

    // MariaDB + Galera Cluster
    'mariadb-galera-cluster' => [
        'title' => 'MariaDB + Galera Cluster',
        'desc' => "Database MySQL altamente disponibile e distribuito con MariaDB e Galera Cluster. Supporta il failover automatico.",

        // Step 1
        's1' => [
            'title' => '1. Raccogli i tuoi host',
            'desc' => 'Per avere una configurazione più flessibile, e non avere il bisogno di ricordare indirizzi IP, modifica <code>/etc/hosts</code> e inserisci le righe seguenti:',
            'desc2' => 'Modifica ogni indirizzo IP e hostname come meglio preferisci.',
            'note' => 'È (ovviamente) possibile inserire <strong>indirizzi IPv6</strong>:',
        ],

        // Step 2
        's2' => [
            'title' => '2. Installa MariaDB e Galera Cluster',
        ],

        // Step 3
        's3' => [
            'title' => '3. Configura il primo nodo',
            'note' => 'Modifica <code>/etc/mysql/mariadb.cnf.d/50-server.cnf</code> e assicurati che la seguente riga sia commentata:',
            'desc' => "Crea l'utente per la replicazione: (modifica i parametri in grassetto)",
            'desc2' => 'Modifica <code>/etc/mysql/mariadb.cnf.d/60-galera.cnf</code>: (modifica i parametri in grassetto)',
            'desc3' => 'Crea il cluster:',
        ],

        // Step 4
        's4' => [
            'title' => '4. Configurazione degli altri nodi',
            'desc' => 'Ora che il cluster è stato configurato sul primo nodo, è sufficiente copiare il file di configurazione su tutti gli altri nodi, assicurandosi di modificare gli ultimi 5 parametri, che identificano univocamente il nodo.',
            'desc2' => 'Esempio: configurazione su un secondo nodo.',
            'desc3' => 'Dopo aver configurato ogni nodo, è possibile avviare MariaDB:',
        ],

        // Step 5
        's5' => [
            'title' => '5. Configura il firewall',
            'desc' => 'Assicurati di aprire le seguenti porte:',
            'warning' => 'Questa è solo una configurazione di esempio. È vivamente consigliato che tu modifichi questa configurazione in modo tale che solo i tuoi nodi possano comunicare su queste porte.',
        ],

        // Step 6
        's6' => [
            'title' => '6. Verifica configurazione',
            'desc' => 'Verifica che il tuo cluster abbia il corretto numero di nodi con il seguente comando:',
            'desc2' => 'In questo caso, dato che abbiamo configurato <strong>3 nodi</strong>, il comando restituirà il seguente:',
            'desc3' => 'Per essere sicuri che la replicazione funziona, creiamo un DB e una tabella di prova su un nodo:',
            'desc4' => 'Esegui questo comando su un qualsiasi altro nodo:',
        ],

        // Step 7
        's7' => [
            'title' => '7. Configurazione load balancer con nginx (opzionale)',
            'desc' => 'È possibile usare nginx per distribuire i carichi di lavoro (load balancer) per il cluster. Modifica <code>/etc/nginx/nginx.conf</code> e aggiungi la configurazione seguente:'
        ]
    ],
];

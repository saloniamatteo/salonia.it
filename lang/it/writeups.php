<?php

// Italian dict file for writeups
return [
    'title' => 'Writeups',
    'desc' => 'Le guide tecniche di Matteo Salonia.',

    // MariaDB + Galera Cluster
    'mgc' => [
        'title' => 'MariaDB + Galera Cluster',
        'desc' => 'Database MySQL altamente disponibile e distribuito con MariaDB e '
                  . 'Galera Cluster. Supporta il failover automatico.',

        // Step 1
        's1' => [
            'title' => '1. Raccogli i tuoi host',
            'desc' => 'Per avere una configurazione più flessibile, e non avere il '
                      . 'bisogno di ricordare indirizzi IP, modifica '
                      . '<code>/etc/hosts</code> e inserisci le righe seguenti:',

            'desc2' => 'Modifica ogni indirizzo IP e hostname come meglio '
                       . 'preferisci.',

            'note' => 'È (ovviamente) possibile inserire '
                      . '<strong>indirizzi IPv6</strong>:',
        ],

        // Step 2
        's2' => [
            'title' => '2. Installa MariaDB e Galera Cluster',
        ],

        // Step 3
        's3' => [
            'title' => '3. Configura il primo nodo',
            'note' => 'Modifica <code>/etc/mysql/mariadb.cnf.d/50-server.cnf</code> '
                      . 'e assicurati che la seguente riga sia commentata:',

            'desc' => "Crea l'utente per la replicazione: "
                      . '(modifica i parametri in grassetto)',

            'desc2' => 'Modifica '
                       . '<code>/etc/mysql/mariadb.cnf.d/60-galera.cnf</code>: '
                       . '(modifica i parametri in grassetto)',

            'desc3' => 'Crea il cluster:',
        ],

        // Step 4
        's4' => [
            'title' => '4. Configurazione degli altri nodi',

            'desc' => 'Ora che il cluster è stato configurato sul primo nodo, è '
                      . 'sufficiente copiare il file di configurazione su tutti gli '
                      . 'altri nodi, assicurandosi di modificare gli ultimi 5 '
                      . 'parametri, che identificano univocamente il nodo.',

            'desc2' => 'Esempio: configurazione su un secondo nodo.',

            'desc3' => 'Dopo aver configurato ogni nodo, è possibile avviare '
                       . 'MariaDB:',
        ],

        // Step 5
        's5' => [
            'title' => '5. Configura il firewall',
            'desc' => 'Assicurati di aprire le seguenti porte:',

            'warning' => 'Questa è solo una configurazione di esempio. '
                         . 'È vivamente consigliato che tu modifichi questa '
                         . 'configurazione in modo tale che solo i tuoi nodi '
                         . 'possano comunicare su queste porte.',
        ],

        // Step 6
        's6' => [
            'title' => '6. Verifica configurazione',
            'desc' => 'Verifica che il tuo cluster abbia il corretto numero di nodi '
                      . 'con il seguente comando:',

            'desc2' => 'In questo caso, dato che abbiamo configurato '
                       . '<strong>3 nodi</strong>, il comando restituirà il '
                       . 'seguente:',

            'desc3' => 'Per essere sicuri che la replicazione funziona '
                       . 'correttamente, creiamo un DB e una tabella di prova '
                       . 'su un nodo qualsiasi:',

            'desc4' => 'Esegui questo comando su un altro nodo qualsiasi:',
        ],

        // Step 7
        's7' => [
            'title' => '7. Load balancer con nginx',

            'desc' => 'È possibile usare nginx opzionalmente per distribuire i '
                      . 'carichi di lavoro (load balancer) per il cluster. Modifica '
                      . '<code>/etc/nginx/nginx.conf</code> e aggiungi la '
                      . 'configurazione seguente:'
        ]
    ],

    // SSH Passwordless login
    'spl' => [
        'title' => 'SSH Passwordless Login',
        'desc' => 'Configurazione client e server SSH per accesso senza password',

        // Client config
        'client' => [
            'desc' => 'Configura il tuo client SSH in modo tale da poter effettuare '
                      . "l'accesso senza dover inserire la password "
                      . "dell'utente remoto. Necessario in ambienti dove l'accesso "
                      . 'tramite password non è consentito.',

            // Step 1
            's1' => [
                'title' => '1. Genera keypair',
                'desc' => 'È necessario creare una coppia di chiavi (keypair). '
                          . 'Esegui il seguente comando per creare una coppia di '
                          . 'chiavi con crittografia <strong>RSA 4096</strong>:',

                'desc2' => 'Verranno richiesti i seguenti parametri:',

                'li' => [
                    'file' => [
                        'title' => 'File in cui salvare la chiave',
                        'desc' => 'Mantieni il valore default (esempio: :path)',
                    ],

                    'password' => [
                        'title' => 'Password da usare per la chiave',
                        'desc' => 'Inserisci una password sicura. '
                                  . 'Puoi anche inserire una password vuota '
                                  . '(non consigliato).',
                    ],
                ],
            ],

            // Step 2
            's2' => [
                'title' => '2. Configura .ssh/config',
                'desc' => 'Il file <code>~/.ssh/config</code> contiene tutte le '
                          . 'configurazioni dei tuoi host, permettendoti di non '
                          . 'dover inserire nome utente e indirizzo IP/hostname '
                          . 'ogni volta che vuoi accedere ad un host. '
                          . 'Modifica questo file con un editor di testo, ed '
                          . 'inserisci le seguenti righe: ',

                'desc2' => 'Imposta i parametri in grassetto in questo modo:',

                'li' => [
                    'host' => 'Il nome mnemonico che verrà usato ogni volta '
                              . "che vorrai connetterti all'host. "
                              . 'In questo caso: :cmd',

                    'user' => "Il nome dell'utente remoto.",

                    'hostname' => "L'indirizzo IP o l'hostname dell'host remoto. "
                                  . 'È possibile inserire indirizzi IP (:ip), '
                                  . 'hostname (:hosts), '
                                  . 'o nomi di dominio (:domain).',
                ],
            ],

            // Step 3
            's3' => [
                'title' => "3. Copia la chiave all'host",
                'desc' => 'Esegui il seguente comando: ',
                'desc2' => "Inserisci la password dell'utente remoto, "
                           . 'e non la password della tua chiave. '
                           . 'Se tutto è andato a buon fine, eseguendo il '
                           . 'comando qui sotto dovresti poter accedere al server:',

                'desc3' => 'Se non riesci ad accedere al server tramite ssh, ma '
                           . 'puoi modificare i contenuti sul disco, puoi copiare '
                           . 'la tua chiave pubblica sul tuo server, dentro il '
                           . 'file :file, con il seguente formato:',

                'desc4' => 'Dove:',

                'li' => [
                    'ssh-rsa' => 'Algoritmo di crittografia della chiave (RSA)',
                    'pkey' => 'Chiave pubblica',
                    'host' => 'Opzionale; Aiuta ad identificare a chi '
                              . 'appartiene la chiave',
                ],
            ],
        ],

        // Server config
        'server' => [
            'desc' => 'Configura il tuo server affinchè solo le chiavi SSH possano '
                      . "essere utilizzate per l'autenticazione. Disabilita anche "
                      . "il login all'utente root per una sicurezza maggiore.",

            // Step 1
            's1' => [
                'title' => '1. Modifica /etc/ssh/sshd_config',
                'desc' => 'Modifica la configurazione del server ssh, '
                          . 'situata in :path, e assicurati che queste '
                          . 'opzioni siano impostate nel seguente modo:',
            ],

            // Step 2
            's2' => [
                'title' => '2. Riavvia sshd',
                'desc' => 'Esegui il seguente comando:',
                'desc2' => 'Il server ssh verrà riavviato, e la nuova '
                           . 'configurazione verrà applicata.',
            ],
        ],
    ],

    // Kubernetes
    'k8s' => [
        'title' => 'Cluster Kubernetes',
        'desc' => 'Cluster Kubernetes (k8s) con Control Plane e Nodi Worker',

        // Step 1
        's1' => [
            'title' => '1. Prerequisiti',
            'desc' => 'I :req1 requisiti :req2 di Kubernetes sono i seguenti:',

            'req' => [
                'node' => 'per ogni nodo',
                'hostname' => 'Hostname univoco per ogni nodo',
                'ports' => ':req1 Porte aperte nel firewall :req2',
            ],
        ],

        // Step 2
        's2' => [
            'title' => '2. Disabilita swap',
            'desc' => 'È necessario :req1 disabilitare la swap:req2:',
            'desc2' => 'Inoltre, modifica :file, e commenta la riga che '
                      . 'contiene :swap. Ad esempio:',
        ],

        // Step 3
        's3' => [
            'title' => '3. Configura Kernel',
            'desc' => 'È necessario modificare alcune impostazioni del Kernel.',
        ],

        // Step 4
        's4' => [
            'title' => '4. Configura firewall',
            'desc' => 'Assicurati di aprire le seguenti porte:',
            'worker' => 'Nodi Worker',
            'warning' => 'Questa è solo una configurazione di esempio. '
                       . 'È vivamente consigliato che tu modifichi questa '
                       . 'configurazione in modo tale che solo i tuoi nodi  '
                       . 'possano comunicare su queste porte. ',
        ],

        // Step 5
        's5' => [
            'title' => '5. Installa pacchetti',
        ],

        // Step 6
        's6' => [
            'title' => '6. Configura pacchetti',
        ],

        // Step 7
        's7' => [
            'title' => '7. Avvia servizi',
        ],

        // Step 8
        's8' => [
            'title' => '8. Crea cluster',
            'desc' => 'Crea un cluster con indirizzi IP nel range :range:',
            'info' => 'Qualora dovessero presentarsi problemi, per '
                      . 'resettare ed eliminare il cluster, e tutti i '
                      . 'dati relativi a Kubernetes, esegui i comandi seguenti:',

            'info2' => 'Avvia kubelet:',

            'desc2' => 'Una volta creato il cluster, verrà mostrato '
                       . 'un comando come il seguente:',

            'desc3' => 'Questo comando va eseguito su :b ogni nodo worker:eb '
                       . 'da aggiungere al cluster. Sostituisci i parametri '
                       . 'in grassetto con quelli ottenuti dal comando.',

            'desc4' => 'Dopo aver creato il cluster, copia la '
                       . 'configurazione nella tua home directory:',

            'desc5' => 'Verifica il numero di nodi nel cluster:',

            'desc6' => 'Esempio di output:',

            'info3' => 'Ogni nodo tipicamente entra nello status :x '
                       . 'quasi immediatamente, o comunque meno di 30 secondi '
                       . 'dalla sua data di aggiunta.',
        ],

        // Step 9
        's9' => [
            'title' => '9. Installa Calico CNI',
            'desc' => 'Calico CNI (Container Network Interface) fornisce '
                      . 'connettività di rete, sicurezza, e osservabilità '
                      . 'per applicazioni containerizzate. Installalo con '
                      . 'i comandi seguenti:',
        ],

        // Step 10
        's10' => [
            'title' => '10. Esegui test',
            'desc' => 'Verifichiamo ora che il cluster, il Control Plane, '
                      . 'e i Nodi Worker funzionino correttamente. ',

            'desc2' => 'Crea un namespace di test:',
            'desc3' => 'Crea il file :file, modificalo, '
                       . 'ed inserisci il seguente:',
            'desc4' => 'Applica il file:',
            'desc5' => 'Controlla che i pod siano stati avviati:',
            'desc6' => 'Esegui lo script sottostante per controllare che '
                       . 'la funzionalità di load balancing funzioni:',

            'desc7' => 'Ad esempio, se nel cluster vi sono 2 nodi worker, '
                       . 'dovresti vedere il seguente output:',

            'info' => 'Nota che non sempre ogni nodo sarà presente al 50% '
                       . '(richieste_servite / richieste_totali). '
                       . 'Questo è più che normale, in quanto Kubernetes '
                       . 'tiene in conto il carico del sistema, oltre ad '
                       . 'eseguire uno scheduling round-robin.',

            'info2' => 'Questo significa che, ad esempio, potresti vedere: ',
            'info3' => '...e subito dopo:',

            'desc8' => "Rimuovi l'ambiente di test:",
        ],
    ],
];

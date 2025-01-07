<?php

// Italian dict file for info
return [
    'title' => 'Info',
    'desc' => 'Scopri chi sono, le mie competenze, e le mie conoscenze.',

    // Hero
    'hero' => [
        'desc' => "Sono un ragazzo Italiano originario della Sicilia, provincia di Ragusa. Mi sono <strong>diplomato</strong> in data <strong>29/06/2023</strong> con un punteggio di <strong>98/100</strong> presso la Ragioneria <strong>ITC Archimede</strong> di Modica (RG), in qualità di <strong>Ragioniere Perito Informatico</strong>. Qui ho frequentato il corso <strong>SIA</strong> (<em>Sistemi Informativi Aziendali</em>).",
        'desc2' => 'Nel corso degli anni ho intrapreso un percorso di <strong>approfondimento autonomo</strong> dei concetti, che mi ha consentito di ampliare significativamente le mie competenze in <strong>diversi ambiti</strong>. In particolare, sono specializzato in:',

        // Specializations
        'spec' => [
            // GNU/Linux
            'linux' => [
                'title' => 'GNU/Linux',
                'desc' => 'Configurazione e compilazione del <strong>Kernel</strong> per sistemi con necessità <strong>high-performance</strong>, uso quotidiano, <strong>real-time</strong>, ecc.',
                'desc2' => 'Gestione server in grado di sostenere <strong>migliaia di utenti</strong> in <strong>contemporanea</strong>, ed implementazione di misure volte alla <strong>riduzione dei costi</strong>.',
                'desc3' => 'Distro: <strong>Arch</strong>, <strong>Artix</strong>, <strong>Debian</strong>, <strong>Devuan</strong>, <strong>Gentoo</strong>, <strong>RHEL</strong>, <strong>Ubuntu</strong>',
            ],

            // Cloud computing
            'cloud' => [
                'title' => 'Cloud computing',
                'desc' => 'Gestione delle <strong>infrastrutture in cloud</strong>, quali <strong>server</strong>, <strong>database</strong>, <strong>storage</strong>, ecc.',
            ],

            // Firewall
            'firewall' => [
                'title' => 'Firewall',
                'desc' => 'Configurazione <strong>firewall</strong>, con <strong>filtraggio delle porte</strong> e <strong>rate-limiting</strong>.',
                'desc2' => 'Configurazione <strong>Suricata IDS/IPS</strong>.',
                'desc3' => '<strong>Blocco</strong> delle <strong>richieste malevole</strong> tramite <strong>Fail2ban</strong>, e segnalazione automatica su <strong>AbuseIPDB</strong>.',
            ],

            // Web server
            'webserver' => [
                'title' => 'Server web',
                'desc' => 'Implementazione <strong>policy di sicurezza</strong> e <strong>certificati SSL</strong>, protocolli <strong>HTTP2</strong> e <strong>HTTP3/QUIC</strong>, <strong>rate-limiting di asset</strong> (<strong>nginx</strong>)',
            ],

            // Web dev
            'web' => [
                'title' => 'Sviluppo siti web',

                // Frontend
                'frontend' => [
                    'title' => 'Sviluppo frontend',
                    'desc' => '<strong>Riduzione</strong> delle <strong>dipendenze su JS</strong>, <strong>design responsive</strong> e <strong>moderno</strong>.',
                ],

                // Backend
                'backend' => [
                    'title' => 'Sviluppo backend',
                    'desc' => '<strong>PHP 8 + Laravel 11</strong>, <strong>compressione</strong> e <strong>riduzione dei contenuti</strong>, <strong>riduzione</strong> dei <strong>tempi di caricamento</strong>, blocco delle richieste da IP presenti in <strong>AbuseIPDB</strong>, <strong>rate-limiting</strong>.',
                ],
            ],

            // Domains & DNS
            'dns' => [
                'title' => 'Nomi di dominio e DNS',
                'desc' => 'Configurazione <strong>zone</strong> e <strong>record DNS</strong>. Implementazione <strong>ad-hoc</strong> di un <strong>client DDNS</strong>, tramite <strong>chiamate API</strong>.',
            ],
        ],
    ],

    // Timeline
    'timeline' => [
        'title' => 'Percorso formativo',

        // 2018
        '2018' => [
            'title' => '2018 &mdash; 3° Media-1° Superiore (corso AFM)',
            'B2' => 'Certificazione B2 Inglese',
            'linux' => 'Prima esperienza con Linux, tramite Raspbian su Raspberry Pi 0 W (1° gen), e Ubuntu 16 su Sony Vaio VGN-N11M',
            'py' => 'Prima esperienza con programmazione in Python',
            'vbnet' => 'Sviluppo piccoli programmi in Visual Basic .NET',
        ],

        // 2019
        '2019' => [
            'title' => '2019 &mdash; 1-2° Superiore (corso AFM)',
            'ubnt' => 'Sviluppo esperienza con Ubuntu (GNOME+LXDE+XFCE) e Linux Mint',
            'webs' => 'Sviluppo frequente di siti web con vari strumenti e con stili diversi',
            'prog' => 'Approfondimento e studio di teorie della programmazione',
        ],

        // 2020
        '2020' => [
            'title' => '2020 &mdash; 2-3° Superiore (corso SIA)',
            'arch' => 'Passaggio da Ubuntu ad Arch Linux',
            'appr' => 'Approfondimento concetti e teorie chiave Linux',
            'guide' => 'Redazione guida su installazione Arch Linux',
            'artix' => 'Passaggio da Arch Linux ad Artix Linux',
        ],

        // 2021
        '2021' => [
            'title' => '2021 &mdash; 3-4° Superiore (corso SIA)',
            'gento' => 'Passaggio da Artix Linux a Gentoo Linux',
            'knowl' => 'Miglioramento notevole conoscenze Linux',
            'C' => 'Studio ed approfondimento linguaggio C, sviluppo di vari programmi in C',
            'andr' => 'Sviluppo piccole applicazioni Android',
            'kconf' => 'Primi passi con personalizzazione Kernel volta a migliorare prestazioni ed efficienza',
        ],

        // 2022
        '2022' => [
            'title' => '2022 &mdash; 4-5° Superiore (corso SIA)',
            'prog' => 'Studio ed approfondimento teorie di programmazione',
            'desig' => 'Studio ed approfondimento teorie di design',
            'elec' => 'Miglioramento competenze in impianti elettrici, impianti reti locali, e sistemi di sorveglianza',
            'works' => 'Costruzione workstation performante con Gentoo Linux',
            'lan' => 'Costruzione e miglioramento rete locale, con connettività IPV6',
        ],

        // 2023
        '2023' => [
            'title' => '2023 &mdash; 5° Superiore (corso SIA)',
            'perf' => 'Miglioramento prestazioni Kernel personalizzato',
            'pwork' => 'Miglioramento prestazioni ed efficienza workstation, con manutenzione periodica',
            'lan' => 'Miglioramento rete locale',
            'db' => 'Approfondimento teorie e concetti dei database, con collegamento PHP',
            'webs' => 'Redesign sito web personale',
            'dipl' => 'Diploma di <strong>Ragioniere Perito Informatico</strong>, punteggio <strong>98/100</strong>',
        ],

        // 2024
        '2024' => [
            'title' => '2024',
            'elec' => 'Ampliamento conoscenze degli <strong>impianti elettrici</strong>',
            'eleng' => 'Ampliamento conoscenze di <strong>elettrotecnica</strong>',
            'pract' => 'Miglioramento abilità pratiche di <strong>installazione impianti elettrici</strong>, <strong>domotici</strong>, <strong>videosorveglianza</strong>, <strong>antifurto</strong>, <strong>rete dati (LAN)</strong>',
            'ci' => 'Introduzione di <strong>CodeIgniter</strong> in sito web personale',
            'kconf' => 'Approfondimento della configurazione del <strong>Kernel</strong>: Kernel ancora più piccolo, mettendo in primo piano le prestazioni',
            'laravel' => 'Riscrittura sito web con <strong>Laravel</strong>, con ulteriore analisi e miglioramento delle prestazioni. Miglioramento UI del sito web.',
        ],

        // 2025
        '2025' => [
            'title' => '2025',
            'aws' => 'Ottenimento <strong>borsa di studio</strong> tramite <strong>Edgemony</strong>, e <strong>certificazione</strong> presso <strong>Amazon Web Services (AWS)</strong> in qualità di <strong>Cloud Engineer</strong> e <strong>Solutions Architect</strong>.',
        ],
    ],
];

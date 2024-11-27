<?php

// Italian dict file for dns
return [
    // Hero
    'title' => 'Server DoH',
    'desc' => 'Scopri come usare il mio server DNS-over-HTTPS (DoH).',

    // Intro
    'intro' => [
        'title' => 'Introduzione',

        'desc' => "Cos'è un server DoH? Un :doh è un server che riceve una :query tramite :http. L'obiettivo principale del protocollo DoH è di aumentare la privacy dell'utente e la sicurezza prevenendo intercettazioni e manipolazioni dei dati del DNS attraverso attacchi :mitm.",
        'doh' => 'server DNS-over-HTTPS',
        'query' => 'query DNS',
        'http' => 'HTTP(S)',
        'mitm' => 'Man-in-the-Middle (MITM)',

        'desc2' => 'Il mio server usa <strong>Unbound</strong> come resolver DNS: ogni singola query viene "risolta" localmente, quindi nessun altro server DNS viene contattato (esempio: Cloudflare, Google, Quad9, ecc.).',

        'desc3' => 'Successivamente, <strong>nginx</strong>, che funge da :rproxy, attiva il supporto <strong>HTTP2</strong> e <strong>HTTP3/QUIC</strong> (oltre al supporto standard HTTP 1.1), definisce i <strong>certificati SSL</strong> da usare, e molte altre impostazioni per incrementare prestazioni e sicurezza.',
        'rproxy' => 'reverse proxy',
    ],

    // Params
    'params' => [
        'title' => 'Parametri',
        'desc' => "Per utilizzare qualsiasi server DoH, è necessario conoscere l'<strong>endpoint</strong>, ovvero quell'indirizzo che verrà contattato per effettuare le query verie e proprie.",

        // Firefox
        'ff' => [
            'desc' => 'Per usarlo su <strong>Firefox</strong>',
            's1' => 'Menu > Impostazioni',
            's2' => 'Privacy e Sicurezza',
            's3' => 'Scendi in fondo fino a trovare la voce <strong>DNS su HTTPS</strong>',
            's4' => 'Seleziona <strong>protezione massima</strong>, seleziona <strong>personalizzato</strong>, ed inserisci',
        ],

        // Android
        'android' => [
            'desc' => "Per usarlo su <strong>Android</strong>, attualmente l'unico modo è tramite :rethink",
            's1' => 'Schermata principale > DNS (in alto a sinistra)',
            's2' => 'Altro DNS > DoH',
            's3' => "Premere l'icona :icon in basso a destra",
            's4' => 'Nome: <strong>Salonia</strong>, URL:',
            's5' => 'Premere <strong>Aggiungi</strong> e selezionare <strong>Salonia</strong>',
        ],
    ],

    // Links
    'links' => [
        'query' => 'https://it.wikipedia.org/wiki/Domain_Name_System',
        'http' => 'https://it.wikipedia.org/wiki/HTTP',
        'mitm' => 'https://it.wikipedia.org/wiki/Attacco_man_in_the_middle',
        'rproxy' => 'https://it.wikipedia.org/wiki/Reverse_proxy',
        'rethink' => 'https://rethinkdns.com',
    ],
];

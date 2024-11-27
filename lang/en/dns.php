<?php

// English dict file for dns
return [
    // Hero
    'title' => 'DoH server',
    'desc' => 'Discover how to use my DNS-over-HTTPS (DoH) server.',

    // Intro
    'intro' => [
        'title' => 'Introduction',

        'desc' => 'What is a DoH server? A :doh is a server that receives a :query via :http. A goal of the method is to increase user privacy and security by preventing eavesdropping and manipulation of DNS data by :mitm attacks by using the HTTPS protocol to encrypt the data.',
        'doh' => 'DNS-over-HTTPS server',
        'query' => 'DNS query',
        'http' => 'HTTP(S)',
        'mitm' => 'Man-in-the-Middle (MITM)',

        'desc2' => 'My server uses <strong>Unbound</strong> as a DNS resolver: each single query is resolved locally, therefore no other DNS server is reached (example: Cloudflare, Google, Quad9, etc.).',

        'desc3' => 'Next, <strong>nginx</strong>, that acts as a :rproxy, enables support for <strong>HTTP2</strong> and <strong>HTTP3/QUIC</strong> (on top of standard support for HTTP 1.1), defines the <strong>SSL certificates</strong> to use, and many more settings to increase performance and security.',
        'rproxy' => 'reverse proxy',
    ],

    // Params
    'params' => [
        'title' => 'Parameters',
        'desc' => 'To use any DoH server, it is mandatory to know the <strong>endpoint</strong>, which is the address that will be reached to make the queries.',

        // Firefox
        'ff' => [
            'desc' => 'To use it on <strong>Firefox</strong>',
            's1' => 'Menu > Settings',
            's2' => 'Privacy & Security',
            's3' => 'Scroll down until you find <strong>DNS-over-HTTPS</strong>',
            's4' => 'Select <strong>maximum protection</strong>, select <strong>custom</strong>, and type',
        ],

        // Android
        'android' => [
            'desc' => 'To use it on <strong>Android</strong>, the only current way is via :rethink',
            's1' => 'Main screen > DNS (top left)',
            's2' => 'Other DNS > DoH',
            's3' => 'Press the :icon icon on the bottom right',
            's4' => 'Name: <strong>Salonia</strong>, URL:',
            's5' => 'Press <strong>Add</strong> and select <strong>Salonia</strong>',
        ],
    ],

    // Links
    'links' => [
        'query' => 'https://en.wikipedia.org/wiki/Domain_Name_System',
        'http' => 'https://en.wikipedia.org/wiki/HTTP',
        'mitm' => 'https://en.wikipedia.org/wiki/Man-in-the-middle_attack',
        'rproxy' => 'https://en.wikipedia.org/wiki/Reverse_proxy',
        'rethink' => 'https://rethinkdns.com',
    ],
];

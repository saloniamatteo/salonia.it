<?php

// English dict file for info
return [
    'title' => 'Info',
    'desc' => 'Discover who I am, my skills, and my knowledge.',

    // Hero
    'hero' => [
        'desc' => "I'm an Italian man originally from Sicily, from the province of Ragusa. I <strong>graduated</strong> on <strong>06/29/2023</strong> with a score of <strong>98/100</strong> at the <strong>ITC Archimede</strong> Accounting School in Modica (RG), as a <strong>Accountant Computer Expert</strong> (<strong>Ragioniere Perito Informatico</strong>). Here I attended the <strong>SIA</strong> course (<em>Sistemi Informativi Aziendali</em>, <em>Corporate Information Systems</em>). I am specialised in:",
        'desc2' => 'Over the years I have undertaken a path of <strong>independent study</strong> of many concepts, which has allowed me to significantly expand my skills in <strong>various areas</strong>. In particular, I specialise in:',

        // Specializations
        'spec' => [
            // GNU/Linux
            'linux' => [
                'title' => 'GNU/Linux',
                'desc' => '<strong>Kernel</strong> configuration &amp; compilation, for <strong>high-performance</strong> systems, daily use, <strong>real-time</strong>, etc.',
                'desc2' => 'Management of servers capable of supporting <strong>thousands of concurrent users</strong>, and implementation of <strong>cost-saving</strong> measures.',
                'desc3' => 'Distro: <strong>Arch</strong>, <strong>Artix</strong>, <strong>Debian</strong>, <strong>Devuan</strong>, <strong>Gentoo</strong>, <strong>RHEL</strong>, <strong>Ubuntu</strong>',
            ],

            // Cloud computing
            'cloud' => [
                'title' => 'Cloud computing',
                'desc' => 'Management of <strong>cloud infrastructures</strong>, such as <strong>servers</strong>, <strong>databases</strong>, <strong>storage</strong>, etc.',
            ],

            // Firewall
            'firewall' => [
                'title' => 'Firewall',
                'desc' => '<strong>Firewall</strong> configuration, with <strong>port filtering</strong> and <strong>rate-limiting</strong>.',
                'desc2' => '<strong>Suricata IDS/IPS</strong> configuration.',
                'desc3' => '<strong>Malicious request blocking</strong> via <strong>Fail2ban</strong> &amp; automatic <strong>AbuseIPDB</strong> reporting.',
            ],

            // Web server
            'webserver' => [
                'title' => 'Web server',
                'desc' => 'Implementation of <strong>security policies</strong> &amp; <strong>SSL certificates</strong>, <strong>HTTP2</strong> &amp; <strong>HTTP3/QUIC</strong> protocols, <strong>asset rate-limiting</strong> (<strong>nginx</strong>)',
            ],

            // Web dev
            'web' => [
                'title' => 'Website development',

                // Frontend
                'frontend' => [
                    'title' => 'Frontend development',
                    'desc' => '<strong>Minimization of JS dependency</strong>, <strong>responsive &amp; modern design</strong>.',
                ],

                // Backend
                'backend' => [
                    'title' => 'Backend development',
                    'desc' => '<strong>PHP 8 + Laravel 11</strong>, <strong>content compression &amp; reduction</strong>, <strong>load time reduction</strong>, blocking of requests from IPs present in <strong>AbuseIPDB</strong>, <strong>rate-limiting</strong>.',
                ],
            ],

            // Domains & DNS
            'dns' => [
                'title' => 'Domain names & DNS',
                'desc' => 'Configuration of <strong>DNS zones &amp; records</strong>. <strong>Ad-hoc</strong> implementation of a <strong>DDNS client</strong>, via <strong>API calls</strong>.',
            ],
        ],
    ],

    // Timeline
    'timeline' => [
        'title' => 'Experience timeline',

        // 2025
        '2025' => [
            'title' => '2025',
            'aws' => 'Obtained a <strong>scholarship</strong> through <strong>Edgemony</strong>, and <strong>certified</strong> at <strong>Amazon Web Services (AWS)</strong> as a <strong>Cloud Engineer</strong> and <strong>Solutions Architect</strong>.',
        ],

        // 2024
        '2024' => [
            'title' => '2024',
            'elec' => '<strong>Electrical systems</strong> knowledge increase',
            'eleng' => '<strong>Electrical engineering</strong> knowledge increase',
            'pract' => 'Practical skills improvement of <strong>electrical</strong>, <strong>home automation/smart home</strong>, <strong>video surveillance</strong>, <strong>anti-theft</strong>, <strong>LAN</strong> systems installation',
            'ci' => 'Introduction of <strong>CodeIgniter</strong> in personal website',
            'kconf' => 'Deep-dive in <strong>Kernel</strong> configuration: even smaller Kernel, with performance in mind',
            'laravel' => 'Website rewrite in <strong>Laravel</strong>, with subsequent analysis and increase of performance. Improvements to website UI.',
        ],

        // 2023
        '2023' => [
            'title' => '2023 &mdash; 13th grade',
            'perf' => 'Improvement of custom Kernel performance',
            'pwork' => 'Improvement of workstation performance and efficiency, with periodic maintenance',
            'lan' => 'Improvement of local network',
            'db' => 'Advanced study of databases, with PHP connection',
            'webs' => 'Personal website redesign',
            'dipl' => 'Accountant &amp; Computer Expert</strong> degree (<strong>Ragioniere Perito Informatico</strong>), score of <strong>98/100</strong>',
        ],

        // 2022
        '2022' => [
            'title' => '2022 &mdash; 12th-13th grade',
            'prog' => 'Advanced study of programming theories',
            'desig' => 'Advanced study of design theories',
            'elec' => 'Knowledge improvement regarding electrical systems, local network systems, and video surveillance systems',
            'works' => 'Built performant workstation with Gentoo Linux',
            'lan' => 'Built and improved local network, with IPV6 connectivity',
        ],

        // 2021
        '2021' => [
            'title' => '2021 &mdash; 11th-12th grade',
            'gento' => 'Move from Artix Linux to Gentoo Linux',
            'knowl' => 'Extensive improvement of Linux knowledge',
            'C' => 'Advanced study of the C programming language, development of various programs in C',
            'andr' => 'Development of small Android apps',
            'kconf' => 'First steps with Kernel personalization to increase performance and efficiency',
        ],

        // 2020
        '2020' => [
            'title' => '2020 &mdash; 10th-11th grade',
            'arch' => 'Move from Ubuntu to Arch Linux',
            'appr' => 'Advanced study of Linux key concepts and theories',
            'guide' => 'Wrote Arch Linux installation guide',
            'artix' => 'Move from Arch Linux to Artix Linux',
        ],

        // 2019
        '2019' => [
            'title' => '2019 &mdash; 9th-10th grade',
            'ubnt' => 'Improved experience with Ubuntu (GNOME+LXDE+XFCE) and Linux Mint',
            'webs' => 'Frequent development of websites with various tools and various styles',
            'prog' => 'Advanced study of programming theories',
        ],

        // 2018
        '2018' => [
            'title' => '2018 &mdash; 8th-9th grade',
            'B2' => 'English B2 certification',
            'linux' => 'First experience with Linux, with Raspbian on a Raspberry Pi 0 W (1° gen), and Ubuntu 16 on a Sony Vaio VGN-N11M',
            'py' => 'First programming experience with Python',
            'vbnet' => 'Development of small programs with Visual Basic .NET',
        ],
    ],
];

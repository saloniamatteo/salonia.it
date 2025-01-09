<?php

// Italian dict file for kernel
return [
    'title' => 'Kernel',
    'desc' => "Il Kernel di Matteo Salonia, ottimizzato per massimizzare le prestazioni dell'hardware, ed essere più leggero possibile.",

    // Go to
    'go-to' => [
        'title' => 'Vai a',
        'intro' => 'Introduzione',
        'setup' => 'Setup',
        'extra' => 'Extra',
    ],

    // Intro
    'intro' => [
        'components' => [
            'desc' => 'I miei setup si basano su un sistema composto dai seguenti componenti:',

            'distro' => [
                'name' => 'Distro',
                'value' => 'Gentoo Linux',
            ],

            'kcompr' => [
                'name' => 'Kernel Compression',
                'value' => "LZ4 per l'initramfs, zstd per zswap",
            ],

            'initramfs' => [
                'name' => 'Initramfs',
                'value' => 'Dracut',
            ],

            'bootld' => [
                'name' => 'Bootloader',
                'value' => 'GRUB',
            ],

            'init' => [
                'name' => 'Init',
                'value' => 'OpenRC',
            ],

            'fs' => [
                'name' => 'Filesystem',
                'fat32' => "FAT32 per l' :esp",
                'xfs' => 'XFS per il :rootfs',
                'ext4' => 'ext4 per varie',
            ],

            'logind' => [
                'name' => 'Logind',
                'value' => 'elogind',
            ],
        ],

        // Note
        'note' => 'Dato che uso <b>Gentoo</b>, i nomi dei pacchetti potrebbero essere diversi dai nomi dei pacchetti che usa la vostra distro (Arch, Debian, Fedora, ...). Siete pregati di verificare qualora i nomi fossero diversi, e di annotarli per procedere con questa guida.',

        // Configs
        'configs' => [
            'desc' => 'Vi sono tre configurazioni di default',

            'config' => '<strong>ThinkPad T470p</strong>, con CPU <strong>i7-7820HQ</strong> (Kaby Lake, 4C8T), <strong>Nvidia GeForce 940MX</strong> dGPU + <strong>Intel HD 630</strong> iGPU, SATAIII/NVMe SSD, 2560x1440 display.',
            'config-t440p' => '<strong>ThinkPad T440p</strong>, con CPU <strong>i7-4700MQ</strong> (Haswell, 4C8T), <strong>Intel HD4600</strong> iGPU, SATAIII SSD, 1366x768 display.',
            'config-pc' => 'PC personalizzato, con CPU <b>i5-11400</b> (Rocket Lake, 6C12T), <strong>Intel UHD 730</strong> iGPU, NVMe SSD.',

            'desc2' => 'Verificate che i componenti desiderati siano abilitati nel Kernel, qualora venga usata la mia configurazione come punto di partenza. Ad esempio, componenti relativi ad AMD, Nvidia (non su T470p), NUMA, ecc. sono stati disabilitati.',
            'desc3' => 'Se non sapete da dove partire, usate una configurazione già esistente che sapete funzioni sul vostro hardware, se disponibile, altrimenti usate la configurazione di default di un qualsiasi Kernel, come quella fornita dalla vostra distro, o la configurazione di default del Kernel.',
        ],
    ],

    // Setup
    'setup' => [
        'desc' => 'Assicuratevi di avere tutti gli strumenti necessari per poter proseguire. Verificate di avere <code>git</code>, <code>gcc</code>, <code>make</code>, ecc. Tipicamente, la maggior parte di strumenti per la compilazione viene fornita da pacchetti come <code>base-devel</code>. Consiglio di verificare anche la presenza di <code>linux-firmware</code>, in modo tale da avere i necessari firmware per eventuali componentistiche :nonfree. Non dimenticate di scaricare il :microcode adatto, che sia Intel, AMD, o altro. Infine, verificate la presenza di <code>lz4</code> e <code>zstd</code>, per la compressione di vari componenti del Kernel.',
        'desc2' => "<strong>Utenti Gentoo</strong>: è altamente consigliato l'uso di :installkernel per creare automaticamente l'initramfs ed aggiornare la configurazione del bootloader, rispettando le vostre preferenze di sistema (e.g. initramfs->dracut, bootloader->GRUB).",

        // Step 1
        's1' => [
            'title' => '1. Ottenimento repository',
            'desc' => 'Useremo la directory <code>/usr/src/usr-kernel</code> per salvare questo progetto, e tutte le eventuali modifiche. <br> Assicuratevi di avere permessi di lettura e scrittura, in modo tale da poter creare la directory.',

            'note' => "Qualora la directory scelta dovesse essere diversa, non dimenticatevi di modificare la variabile <code class='d'>CUSTDIR</code> nel file <code class='d'>build.sh</code>.",
        ],

        // Step 2
        's2' => [
            'title' => '2. Selezione versione',
            'desc' => 'Una volta scaricata la repository, scegliete una versione disponibile. Per vedere quali versioni sono disponibili, basta vedere i contenuti della directory con <code>ls</code>:',
            'desc2' => 'In questo esempio, utilizzeremo Linux <code>6.12.8-gentoo</code>.',

            'note' => "<u>Il vostro Kernel sicuramente avrà una versione diversa</u>. Niente panico: basterà copiare la cartella, e rinominarla in base alla vostra versione. Ad esempio, se la vostra versione dovesse essere <code class='d'>6.12.9-zen</code>, basterà eseguire: <code class='d'>cp -r 6.12.8-gentoo 6.12.9-zen</code>. Non dimenticatevi di modificare la variabile <code class='d'>KVER</code> qualora la versione primaria dovesse essere diversa (esempio: <code class='d'>6.12.8</code> -> <code class='d'>6.12.9</code>), e la variabile <code class='d'>PVER</code> qualora la versione secondaria dovesse essere diversa (esempio: <code class='d'>gentoo</code> -> <code class='d'>zen</code>)",
        ],

        // Step 3
        's3' => [
            'title' => '3. Modifica script',
            'desc' => 'A questo punto, non ci resta che verificare il contenuto di <code>build.sh</code>. Modifichiamo il file con qualsiasi editor di testo, e osserviamo le seguenti variabili:',

            'custdir' => 'cartella che contiene questo progetto.',
            'kver' => 'versione primaria Kernel.',
            'pver' => 'versione secondaria/personalizzata Kernel.',
            'kerneldir' => 'directory che contiene i vari Kernel.',
            'jobs' => 'quanti thread usare per la compilazione. Valore consigliato: numero di core fisici.',
            'configfile' => 'il nome del file di configurazione, che verrà copiato dalla directory al Kernel.',
        ],

        // Step 4
        's4' => [
            'title' => '4. Selezione flag',
            'desc' => 'Dopo aver modificato <code>build.sh</code>, bisogna selezionare i necessari parametri per poter stabilire quali azioni intraprendere.<br>Segue ora una tabella con tutti i vari parametri (flag).',

            'table' => [
                'sflag' => 'Flag breve',
                'lflag' => 'Flag esteso',
                'desc' => 'Descrizione',

                'b' => 'Non compilare il Kernel.',
                'c' => 'Non copiare il file di configurazione Kernel (<code>config</code>).',
                'd' => 'Usa :distcc per velocizzare la compilazione del Kernel.',
                'e' => 'Usa :ccache per velocizzare la compilazione del Kernel.',
                'f' => 'Compila il Kernel con opzioni di Matematica Veloce non sicura (Unsafe Fast Math).',
                'g' => 'Compila il Kernel con Graphite',
                'h' => "Mostra il menu' di aiuto ed esci.",
                'l' => 'Applica le patch di Clear Linux.',
                'm' => 'Esegui <code>make menuconfig</code> nella directory del Kernel ed esci senza compilare.',
                'o' => 'Compila il Kernel con le ottimizzazioni per la famiglia del processore.',
                'p' => 'Applica le patch utente.',
                'r' => 'Compila Kernel con scheduler BORE',
                'v' => 'Compila il modulo :v4l2loopback.',
                'z' => 'Mostra variabili ed esci.',
            ],
        ],

        // Step 5
        's5' => [
            'title' => '5. Configurazione Kernel',
            'desc' => 'Tipicamente, sarà necessario andare a configurare il Kernel, partendo da un file di configurazione. Per fare ciò, basterà eseguire il seguente comando come utente root:',

            // Command
            'cmd' => [
                'desc' => 'Questo ci permetterà di',

                'l' => 'Applicare le patch di Clear Linux',
                'm' => 'Configurare il Kernel con <code>make menuconfig</code>',
                'o' => 'Applicare le ottimizzazioni per la famiglia del processore',
                'p' => 'Applicare le patch incluse',
            ],

            'desc2' => 'Una volta terminato il processo di configurazione del Kernel, il nuovo file di configurazione sarà disponibile presso <code>/usr/src/linux/.config</code> (oppure sotto <code>$KERNELDIR/.config</code> qualora <code>KERNELDIR</code> fosse stato impostato).',
            'desc3' => 'A questo punto bisognerà copiare il file <code>.config</code> dalla directory del Kernel alla directory del Kernel scelto (in questo caso <code>6.12.8-gentoo</code>), per poi confrontare i due file e controllare eventuali cambiamenti:',

            'desc4' => "L'ultimo comando esegue il comando <code>diff</code>, mostrando le differenze tra il nostro file di partenza <code>config</code> ed il nuovo file <code>config.new</code>, per poi mostrare il tutto con l'editor Vim. Ovviamente, bisogna modificare il nome del file <code>config</code> nel comando sopra qualora fosse necessario (esempio: si usa una config personalizzata)",
            'desc5' => "Notate il <code>6.12.8-gentoo</code> in entrambi i comandi: modificatelo quando usate una versione del Kernel diversa.",
            'desc6' => 'Dopo aver verificato le eventuali differenze, sostituiamo il nostro file config con il file <code>config.new</code>, e passiamo alla vera e propria compilazione del Kernel:',
        ],

        // Step 6
        's6' => [
            'title' => '6. Compilazione Kernel',
            'desc' => 'Dopo essere sicuri di avere tutto il necessario, è possibile compilare il Kernel con il seguente comando, eseguendolo come utente <strong>root</strong>:',

            'desc2' => 'Notate la presenza ripetuta delle opzioni di patch (<code>-l</code>, <code>-o</code>, <code>-p</code>). Questo perchè lo script, in automatico, ripristina tutti i cambiamenti effettuati dalle patch presenti nella directory del Kernel, ove possibile, e rimuove gli eventuali file patch. È un comportamento voluto, in quanto ci aiuta a ridurre gli errori causati da patch malformate, non applicate correttamente, non volute, e/o errori vari.',

            'note' => 'Lo script ci mostrerà tutti gli eventuali errori di compilazione e non solo, in aggiunta al calcolo del tempo effettivo di compilazione, non considerando quindi patch ed altro.',

            'desc3' => "Al termine dell'esecuzione, grazie ad <code>installkernel</code>, verrà generato l'initramfs, ed aggiornerà il bootloader. Con la mia configurazione questi corrispondono, rispettivamente, a <code>dracut</code> e <code>grub</code>. Ovviamente spetterà a voi configurare <code>installkernel</code> prima di installare il Kernel.",
        ],
    ],

    // Extra
    'extra' => [
        'desc' => "Questa sezione specifica gli eventuali passaggi da effettuare dopo aver terminato la compilazione del Kernel, che non dipendono dallo script. Usando lo script, non sarà necessario aggiornare manualmente nè l'initramfs, nè il bootloader, perchè verranno aggiornati in automatico (vedi sopra).",

        // V4L2loopback
        'v4l2' => [
            'title' => 'V4L2loopback',
            'desc' => "Lo script installerà questo modulo per la versione del Kernel compilata. L'unico passaggio da effettuare è aggiungere le impostazioni del modulo, in quanto lo script non controlla se sono già presenti o meno.",
            'desc2' => 'Modificate il file <code>/etc/modprobe.d/v4l2loopback.conf</code>, ed inserite il seguente contenuto:',
            'desc3' => 'Qui potete modificare <code>card_label</code> per impostare il nome del dispositivo, qualora fosse necessario, ad esempio se si volesse mascherare il fatto che questo è un dispositivo virtuale, o se semplicemente volete un nome migliore.',
        ],

        // Initramfs
        'initramfs' => [
            'title' => 'Initramfs',
            'desc' => 'Per avviare il Kernel è necessario un initramfs. Per generarlo, userò dracut.',
            'desc2' => 'Prima di tutto, accertatevi di aver configurato dracut. Ad esempio, ecco il mio <code>/etc/dracut.conf</code>:',
            'desc3' => 'È sufficiente eseguire, come utente root, il seguente comando:',
            'desc4' => "Modificate <code>6.8.2-gentoo</code> con la versione del vostro Kernel. Attenzione al flag <code>-f</code>: forza la generazione dell'initramfs, anche se già esiste per la versione del Kernel interessata.",
            'desc5' => "Fatto ciò, l'initramfs sarà disponibile sotto <code>/boot</code>, insieme ai file del Kernel precedentemente compilato.",
        ],

        // Bootloader
        'bootloader' => [
            'title' => 'Bootloader',
            'desc' => 'Per avviare il nostro nuovo Kernel, sarà necessario configurare il bootloader. <strong>In questa sezione vediamo solo GRUB2</strong>.',
            'desc2' => 'La maggior parte degli utenti, arrivati a questo punto, sicuramente avranno già un sistema funzionante, ed un bootloader configurato. Questo fatto ci allevia il carico, richiedendo semplicemente un aggiornamento della configurazione, senza modificare ulteriori file.',
            'desc3' => 'Perciò, è necessario eseguire come utente root:',
            'desc4' => 'Il comando ci comunicherà i Kernel (ed eventuali altri sistemi operativi) trovati, che saranno disponibili al riavvio del nostro sistema, oltre a comunicarci i microcode trovati.',
        ],
    ],

    // Links
    'links' => [
        'esp' => 'https://wiki.archlinux.org/title/EFI_system_partition',
        'rootfs' => 'https://www.kernel.org/doc/html/latest/filesystems/ramfs-rootfs-initramfs.html#what-is-rootfs',
        'nonfree' => 'https://www.gnu.org/philosophy/free-hardware-designs.html',
        'microcode' => 'https://wiki.gentoo.org/wiki/Microcode',
        'installkernel' => 'https://packages.gentoo.org/packages/sys-kernel/installkernel',
        'distcc' => 'https://www.distcc.org',
        'ccache' => 'https://ccache.dev',
        'v4l2loopback' => 'https://github.com/umlaeute/v4l2loopback',
    ],
];

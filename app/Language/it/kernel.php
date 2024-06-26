<?php
// Italian dict file for kernel
return [
	"title"					=> "Kernel",
	"desc"					=> "Il Kernel personalizzato di Matteo Salonia.",
	"welcome"				=> [
		"title"				=> "Kernel",
		"desc"				=> "",
	],
	"go-to"					=> [
		"title"				=> "Vai a:",
		"intro"				=> "Introduzione",
		"setup"				=> "Setup",
		"extra"				=> "Extra",
	],
	"intro"					=> [
		"desc"				=> "Questo progetto è stato realizzato e viene mantenuto per essere un utensile, in grado di aiutarmi a configurare il Kernel come mi pare e piace, permettendomi anche di applicare delle patch in grado di renderlo più efficiente e performante, ottimizzando il Kernel per l'hardware presente, nei minimi dettagli.",
		"setup"				=> [
			"desc"			=> "I miei setup si basano su un sistema composto dai seguenti componenti:",
			"distro"		=> [
				"name"		=> "Distro",
				"value"		=> "Gentoo Linux",
			],
			"kcompr"		=> [
				"name"		=> "Kernel Compression",
				"value"		=> "LZ4 per l'initramfs, zstd per i moduli",
			],
			"initramfs"		=> [
				"name"		=> "Initramfs",
				"value"		=> "Dracut",
			],
			"bootld"		=> [
				"name"		=> "Bootloader",
				"value"		=> "GRUB",
			],
			"init"			=> [
				"name"		=> "Init",
				"value"		=> "OpenRC",
			],
			"fs"			=> [
				"name"		=> "Filesystem",
				"fat32"		=> "FAT32 per l'<a class='link u u-LR' href='https://en.wikipedia.org/wiki/EFI_system_partition'>ESP</a>",
				"xfs"		=> "XFS per il <a class='link u u-LR' href='https://www.kernel.org/doc/html/latest/filesystems/ramfs-rootfs-initramfs.html#what-is-rootfs'>rootfs</a>",
				"ext4"		=> "ext4 per varie",
			],
			"logind"		=> [
				"name"		=> "Logind",
				"value"		=> "elogind",
			],
		],
			"note"			=> "<b>Nota bene</b>: dato che uso <b>Gentoo</b>, i nomi dei pacchetti potrebbero essere diversi dai nomi dei pacchetti che usa la vostra distro (Arch, Debian, Fedora, ...). Siete pregati di verificare qualora i nomi fossero diversi, e di annotarli per procedere con questa guida.",
		"configs"			=> [
			"desc"			=> "Vi sono due configurazioni di default:",
			"config"		=> "per il mio <b>ThinkPad T440p</b>, con CPU <b>i7-4700MQ</b>, nessuna GPU (iGPU), <b>8GB RAM</b>, SSD M.2 2242 + SSD SATAIII.",
			"config-pc"		=> "per il mio PC fisso, con CPU <b>i5-11400</b>, nessuna GPU (iGPU), <b>16GB RAM</b>, SSD NVME Samsung 980 Pro</b>.",
			"subd"			=> "Dati i cambiamenti effettuati nella configurazione del Kernel, sarà necessario verificare che i componenti desiderati sono abilitati nel Kernel, qualora sceglieste la mia configurazione come punto di partenza. Ad esempio, componenti relativi ad AMD, Nvidia, NUMA, ecc. sono stati disabilitati.<br>Se non sapete da dove partire, usate una configurazione già esistente che sapete funzioni sul vostro hardware, se disponibile, altrimenti usate la configurazione di default di un qualsiasi Kernel, come quella fornita dalla vostra distro, o la configurazione di default del Kernel.",
		],
	],
	"setup"					=> [
		"desc"				=> "Assicuratevi di avere tutti gli strumenti necessari per poter proseguire. Verificate di avere <code>git</code>, <code>gcc</code>, <code>make</code>, ecc. Tipicamente, la maggior parte di strumenti per la compilazione viene fornita da pacchetti come <code>base-devel</code>. Consiglio di verificare anche la presenza di <code>linux-firmware</code>, in modo tale da avere i necessari firmware per eventuali componentistiche <a class='link u u-LR' href='https://www.gnu.org/philosophy/free-hardware-designs.html'>nonfree</a>. Non dimenticate di scaricare il <a class='link u u-LR' href='https://wiki.gentoo.org/wiki/Microcode'>microcode</a> adatto, che sia Intel, AMD, o altro. Infine, verificate la presenza di <code>lz4</code> e <code>zstd</code>, per la compressione di vari componenti del Kernel.",
		"s1"				=> [
			"title"			=> "1. Ottenimento repository",
			"desc"			=> "Useremo la directory <code>/usr/src/usr-kernel</code> per salvare questo progetto, e tutte le eventuali modifiche. <br> Assicuratevi di avere permessi di lettura e scrittura, in modo tale da poter creare la directory.",
			"note"			=> "Qualora la directory scelta dovesse essere diversa, non dimenticatevi di modificare la variabile <code>CUSTDIR</code> nel file <code>build.sh</code>.",
		],
		"s2"				=> [
			"title"			=> "2. Selezione versione",
			"desc"			=> "Una volta scaricata la repository, scegliete una versione disponibile. Per vedere quali versioni sono disponibili, basta vedere i contenuti della directory con <code>ls</code>. In questo esempio, utilizzeremo Linux <code>6.8.2-gentoo</code>.",
			"note"			=> "<u>Il vostro Kernel sicuramente avrà una versione diversa.</u><br>Niente panico: basterà copiare la cartella, e rinominarla in base alla vostra versione. Ad esempio, se la vostra versione dovesse essere <code>6.8.3-zen</code>, basterà eseguire: <code>cp -r 6.8.2-gentoo 6.8.3-zen</code>. <br> Non dimenticatevi di modificare la variabile <code>KVER</code> qualora la versione primaria dovesse essere diversa (esempio: <code>6.8.2</code> -> <code>6.8.3</code>), e la variabile <code>PVER</code> qualora la versione secondaria dovesse essere diversa (esempio: <code>gentoo</code> -> <code>zen</code>)",
		],
		"s3"				=> [
			"title"			=> "3. Modifica script",
			"desc"			=> "A questo punto, non ci resta che verificare il contenuto di <code>build.sh</code>. Modifichiamo il file con qualsiasi editor di testo, e osserviamo le seguenti variabili:",
			"archver"		=> "codice architettura processore, per ottimizzare il Kernel. Ecco la lista completa di codici:",
			"configfile"	=> "il nome del file di configurazione, che verrà copiato dalla directory al Kernel.",
			"jobs"			=> "quanti thread usare per la compilazione. Si consiglia di impostare al numero di core.",
			"kver"			=> "versione primaria Kernel.",
			"pver"			=> "versione secondaria/personalizzata Kernel.",
			"kernver"		=> "versione completa Kernel, <u>non modificare</u>.",
			"custdir"		=> "directory che contiene questo progetto, da modificare qualora sia diversa dai default.",
			"cleardir"		=> "nome directory patch Clear Linux, <u>non modificare</u>.",
			"patchdir"		=> "nome directory patch, <u>non modificare</u>.",
			"v4l2dir"		=> "nome directory V4L2loopback, <u>non modificare</u>.",
			"cfodir"		=> "nome directory Kernel Compiler Patch, <u>non modificare</u>.",
			"usrdir"		=> "directory che contiene la versione scelta del Kernel, <u>non modificare</u>.",
			"kerneldir"		=> "questa variabile va impostata qualora la directory del Kernel sia diversa da <code>/usr/src</code>.",
		],
		"s4"				=> [
			"title"			=> "4. Selezione flag",
			"desc"			=> "Dopo aver modificato <code>build.sh</code>, bisogna selezionare i necessari parametri per poter stabilire quali azioni intraprendere.<br>Segue ora una tabella con tutti i vari parametri (flag).",
			"table"			=> [
				"sflag"		=> "Flag breve",
				"lflag"		=> "Flag esteso",
				"desc"		=> "Descrizione",
				"b"			=> "Salta la compilazione del Kernel.",
				"c"			=> "Non copiare il file di configurazione Kernel (<code>config</code>).",
				"d"			=> "Usa <a class='link u u-LR' href='https://www.distcc.org'>distcc</a> per velocizzare la compilazione del Kernel.",
				"e"			=> "Usa <a class='link u u-LR' href='https://ccache.dev'>ccache</a> per velocizzare la compilazione del Kernel.",
				"f"			=> "Compila il Kernel con opzioni di matematica veloce non sicura (unsafe fast math).",
				"h"			=> "Mostra il menu&apos; di aiuto ed esci.",
				"l"			=> "Applica le patch di Clear Linux.",
				"m"			=> "Esegui <code>make menuconfig</code> nella directory del Kernel ed esci senza compilare.",
				"o"			=> "Compila il Kernel con le ottimizzazioni per la famiglia del processore.",
				"p"			=> "Applica le patch utente.",
				"v"			=> "Compila il modulo <a class='link u u-LR' href='https://github.com/umlaeute/v4l2loopback'>v4l2loopback</a>.",
			],
		],
		"s5"				=> [
			"title"			=> "5. Configurazione Kernel",
			"desc"			=> "Tipicamente, sarà necessario andare a configurare il Kernel, partendo da un file di configurazione. Per fare ciò, basterà eseguire il seguente comando come utente root:",
			"cmd1"			=> [
				"desc"		=> "Questo ci permetterà di:",
				"l"			=> "Applicare le patch di Clear Linux",
				"m"			=> "Configurare il Kernel, potendo partire da una configurazione già impostata, o caricarne una personalizzata da cui avere un punto di partenza",
				"o"			=> "Applicare le ottimizzazioni per la famiglia del processore",
				"p"			=> "Applicare le patch utente",
			],
			"desc2"			=> "Una volta terminato il processo di configurazione del Kernel, il nuovo file di configurazione sarà disponibile presso <code>/usr/src/linux/.config</code> (oppure sotto <code>\$KERNELDIR/.config</code> qualora <code>KERNELDIR</code> fosse stato impostato).",
			"desc3"			=> "A questo punto bisognerà copiare il file <code>.config</code> dalla directory del Kernel alla directory attuale, per poi confrontare i due file e controllare eventuali cambiamenti.",
			"cmd2"			=> "L'ultimo comando qui sopra esegue il comando <code>diff</code>, mostrando le differenze tra il nostro file di partenza <code>config</code> ed il nuovo file <code>config.new</code>, per poi mostrare il tutto con l'editor Vim. Ovviamente, bisogna modificare il nome del file <code>config</code> nel comando sopra qualora fosse necessario.",
			"desc4"			=> "Dopo aver verificato le eventuali differenze, sostituiamo il nostro file config con il file <code>config.new</code>, e passiamo alla vera e propria compilazione del Kernel.",
		],
		"s6"				=> [
			"title"			=> "6. Compilazione Kernel",
			"desc"			=> "Dopo essere sicuri di avere tutto il necessario, è possibile compilare il Kernel con il seguente comando, eseguendolo come utente root:",
			"cmd"			=> "Notate la presenza ripetuta delle opzioni di patch (<code>-l</code>, <code>-o</code>, <code>-p</code>). Questo perchè lo script, in automatico, ripristina tutti i cambiamenti effettuati dalle patch presenti nella directory del Kernel, ove possibile, e rimuove gli eventuali file patch. Ho programmato lo script in questo modo in quanto mi capita spesso di dover ripristinare e rimuovere varie patch, soprattutto dopo molteplici compilazioni.",
			"note"			=> "È bene specificare che lo script ci mostrerà tutti gli eventuali errori di compilazione e non solo, in aggiunta al calcolo del tempo effettivo di compilazione, non considerando quindi patch ed altro.",
			"desc2"			=> "Al termine dell'esecuzione, lo script installerà il Kernel, eseguendo in automatico <code>dracut</code> per generare l'initramfs, ed aggiornerà <code>grub</code>, grazie ad <code>installkernel</code>, che tipicamente tutte le distro hanno. Se la vostra configurazione non prevede l'uso di dracut o di grub, verificate la configurazione di <code>installkernel</code>, sarà già impostato per usare quello che state usando attualmente.",
		],
	],
	"extra"					=> [
		"desc"				=> "Questa sezione specifica gli eventuali passaggi da effettuare dopo aver terminato la compilazione del Kernel, che non dipendono dallo script. Usando lo script, non sarà necessario eseguire nè <code>dracut</code> nè <code>grub</code> manualmente, perchè verranno eseguiti in automatico.",
		"v4l2"				=> [
			"title"			=> "V4L2loopback",
			"desc"			=> "Lo script andrà in automatico ad installare questo modulo per la versione del Kernel compilata. L'unico passaggio da effettuare è aggiungere le impostazioni del modulo, in quanto lo script non controlla se sono già presenti o meno.",
			"desc2"			=> "Modificate il file <code>/etc/modprobe.d/v4l2loopback.conf</code>, ed inserite il seguente contenuto:",
			"cmd"			=> "Qui potete modificare <code>card_label</code> per impostare il nome del dispositivo, qualora fosse necessario, ad esempio se si volesse mascherare il fatto che questo è un dispositivo virtuale, o se semplicemente volete un nome migliore.",
		],
		"initramfs"			=> [
			"title"			=> "Initramfs",
			"desc"			=> "Per avviare il Kernel è necessario un initramfs. Per generarlo, userò dracut.",
			"desc2"			=> "Prima di tutto, accertatevi di aver configurato dracut. Ad esempio, ecco il mio <code>/etc/dracut.conf</code>:",
			"desc3"			=> "È sufficiente eseguire, come utente root, il seguente comando:",
			"cmd1"			=> "Modificate <code>6.8.2-gentoo</code> qualora non fosse la versione del Kernel interessata. Attenzione al flag <code>-f</code>, che forza la rigenerazione dell'initramfs anche se già esiste per la versione del Kernel interessata.",
			"cmd2"			=> "Fatto ciò, l'initramfs sarà disponibile sotto <code>/boot</code>, insieme ai file del Kernel precedentemente compilato.",
		],
		"bootloader"		=> [
			"title"			=> "Bootloader",
			"desc"			=> "Per avviare il nostro nuovo Kernel, sarà necessario configurare il bootloader. <u>In questa sezione, sarà trattato esclusivamente GRUB2.</u>",
			"desc2"			=> "La maggior parte degli utenti, arrivati a questo punto, sicuramente avranno già un sistema funzionante, ed un bootloader configurato. Questo fatto ci allevia il carico, richiedendo semplicemente un aggiornamento della configurazione, senza modificare ulteriori file.",
			"desc3"			=> "Perciò, è necessario eseguire come utente root:",
			"cmd"			=> "Il comando ci comunicherà i Kernel (ed eventuali altri sistemi operativi) trovati, che saranno disponibili al riavvio del nostro sistema, oltre a comunicarci i microcode trovati.",
		],
	],
];

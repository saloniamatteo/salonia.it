<?php
// Italian dict file for DNS
return [
	"title"			=> "Server DoH",
	"desc"			=> "Il server DoH di Matteo Salonia.",
	"welcome"		=> [
		"title"		=> "Server DoH",
		"desc"		=> "Scopri come usare il mio server DNS-over-HTTPS (DoH).",
	],
	"go-to"			=> [
		"title"		=> "Vai a",
		"intro"		=> "Introduzione",
		"params"	=> "Parametri",
	],
	"intro"			=> [
		"desc"		=> "Cos'è un server DoH? Un <strong>server DNS-over-HTTPS</strong> è un server che riceve una <strong>%s</strong> tramite <strong>%s</strong>. L'obiettivo principale del protocollo DoH è di aumentare la privacy dell'utente e la sicurezza prevenendo intercettazioni e manipolazioni dei dati del DNS attraverso attacchi %s.",
		"dns"		=> "query DNS",
		"dns-link"	=> "https://it.wikipedia.org/wiki/Domain_Name_System",
		"http"		=> "<strong>HTTP(S)</strong>",
		"http-link"	=> "https://it.wikipedia.org/wiki/HTTP",
		"mitm"		=> "<strong>MITM</strong>",
		"mitm-link"	=> "https://it.wikipedia.org/wiki/Attacco_man_in_the_middle",
		"desc2"		=> "Il mio server, in particolare, usa <strong>Unbound</strong> come server DNS: ogni singola query viene 'risolta' localmente, quindi nessun altro server DNS viene contattato (esempio: Cloudflare, Google, Quad9, ecc.).",
		"desc3"		=> "Successivamente, <strong>nginx</strong>, che funge da %s, attiva il supporto <strong>HTTP2</strong> e <strong>HTTP3/QUIC</strong> (oltre al supporto standard HTTP 1.1), definisce i <strong>certificati SSL</strong> da usare, e molte altre impostazioni per incrementare prestazioni e sicurezza.",
		"rprox"		=> "<strong>reverse proxy</strong>",
		"rprox-link"=> "https://it.wikipedia.org/wiki/Reverse_proxy",
		"desc4"		=> "Usando il mio <strong>server DoH</strong>, avrai la certezza di ricevere non solo un <strong>servizio gratuito</strong>, ma anche <strong>sicuro</strong>, <strong>veloce</strong>, e <strong>professionale</strong>.",
	],
	"params"		=> [
		"desc"		=> "Per utilizzare qualsiasi server DoH, è necessario conoscere l'<strong>endpoint</strong>, ovvero quell'indirizzo che verrà contattato per effettuare le query verie e proprie.",
		"endpoint"	=> "https://dns.salonia.it/dns-query",
		"ff"		=> [
			"desc"	=> "Per usarlo su <strong>Firefox</strong>",
			"s1"	=> "Menu > Impostazioni",
			"s2"	=> "Privacy e Sicurezza",
			"s3"	=> "Scendi in fondo fino a trovare la voce <strong>DNS su HTTPS</strong>",
			"s4"	=> "Seleziona <strong>protezione massima</strong>, seleziona <strong>personalizzato</strong>, ed inserisci",
		],
		"android"	=> [
			"desc"	=> "Per usarlo su <strong>Android</strong>, attualmente l'unico modo è tramite %s",
			"retlnk"=> "https://rethinkdns.com",
			"s1"	=> "Schermata principale > <strong>DNS</strong> (in alto a sinistra)",
			"s2"	=> "Altro DNS > DoH",
			"s3"	=> "Premere l'icona %s in basso a destra",
			"s4"	=> "Nome: Salonia, URL",
			"s5"	=> "Premere <strong>Aggiungi</strong> e selezionare <strong>Salonia</strong>",
		],
	],
];

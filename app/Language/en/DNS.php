<?php
// English dict file for DNS
return [
	"title"			=> "DoH server",
	"desc"			=> "Matteo Salonia's DoH server.",
	"welcome"		=> [
		"title"		=> "Server DoH",
		"desc"		=> "Discover how to use my DNS-over-HTTPS (DoH) server.",
	],
	"go-to"			=> [
		"title"		=> "Go to",
		"intro"		=> "Intro",
		"params"	=> "Parameters",
	],
	"intro"			=> [
		"desc"		=> "What is a DoH server? A <strong>DNS-over-HTTPS server</strong> is a server that receives a %s via %s. A goal of the method is to increase user privacy and security by preventing eavesdropping and manipulation of DNS data by %s attacks by using the HTTPS protocol to encrypt the data.",
		"dns"		=> "<strong>DNS query</strong>",
		"dns-link"	=> "https://en.wikipedia.org/wiki/Domain_Name_System",
		"http"		=> "<strong>HTTP(S)</strong>",
		"http-link"	=> "https://en.wikipedia.org/wiki/HTTP",
		"mitm"		=> "<strong>MITM</strong>",
		"mitm-link"	=> "https://en.wikipedia.org/wiki/Man-in-the-middle_attack",
		"desc2"		=> "My server uses <strong>Unbound</strong> as a DNS server: each single query is resolved locally, therefore no other DNS server is reached (example: Cloudflare, Google, Quad9, ecc.).",
		"desc3"		=> "Next, <strong>nginx</strong>, that acts as a %s, enables support for <strong>HTTP2</strong> and <strong>HTTP3/QUIC</strong> (on top of standard support for HTTP 1.1), defines the <strong>SSL certificates</strong> to use, and many more settings to increase performance and security.",
		"rprox"		=> "<strong>reverse proxy</strong>",
		"rprox-link"=> "https://en.wikipedia.org/wiki/Reverse_proxy",
		"desc4"		=> "Using my <strong>DoH server</strong>, you'll get a service that is not only <strong>free</strong>, but <strong>secure</strong>, <strong>fast</strong>, and <strong>professional</strong> as well.",
	],
	"params"		=> [
		"desc"		=> "To use any DoH server, it is mandatory to know the <strong>endpoint</strong>, which is the address that will be reached to make the queries.",
		"endpoint"	=> "https://dns.salonia.it/dns-query",
		"ff"		=> [
			"desc"	=> "To use it on <strong>Firefox</strong>",
			"s1"	=> "Menu > Settings",
			"s2"	=> "Privacy &amp; Security",
			"s3"	=> "Scroll down until you find <strong>DNS-over-HTTPS</strong>",
			"s4"	=> "Select <strong>maximum protection</strong>, select <strong>custom</strong>, and type",
		],
		"android"	=> [
			"desc"	=> "To use it on <strong>Android</strong>, the only current way is via %s",
			"retlnk"=> "https://rethinkdns.com",
			"s1"	=> "Main screen > <strong>DNS</strong> (top left)",
			"s2"	=> "Other DNS > DoH",
			"s3"	=> "Press the %s icon on the bottom right",
			"s4"	=> "Name: Salonia, URL",
			"s5"	=> "Press <strong>Add</strong> and select <strong>Salonia</strong>",
		],
	],
];

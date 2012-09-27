<? class msg {

function getCmd(&$q) {
	$this->sendSocket($q);
}

function sendSocket(&$q) { $rn=false;
	$s=$q->url->str;
	$ip=$q->url->ip;
	$port=$q->url->port;
	$len=strlen($s);
	$sock=socket_create(AF_INET,SOCK_DGRAM,SOL_UDP);
	socket_sendto($sock,$s,$len,0,$ip,$port);
	socket_close($sock);
	//echo "go: socket_sendto(\$sock,$s,$len,0,$ip,$port);\n";
}

}

?>

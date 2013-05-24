<? class phone {

function getCmd(&$q) { $n="\r\n";
	if (($q->url->mode=="s") || ($q->url->mode=="space")) {
		echo $this->rmSpacesInPhoneNumber($q);
	}
	if ($q->url->t) { echo $n; }
}


function rmSpacesInPhoneNumber(&$q) { $s="";
	$s=preg_replace("/ /","",trim(strval($q->url->phone)));
	return $s;
}

} ?>

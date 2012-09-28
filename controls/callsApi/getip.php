<?php class getip {

function getCmd(&$q) { $n="\r\n";
	if (($q->url->mode=="p") || ($q->url->mode=="phone")) {
		echo $this->getIpByPhone($q);
	}
	if ($q->url->t) { echo $n; }
}

function getIpByPhone(&$q) { $s="";
	if (isset($q->fdb_it)) {
		$sql=$q->sql_getip->getIpByPhone($q->url->phone);
		$query=@ibase_query($q->fdb_it,$sql);
		if (isset($query)) { if ($query) {
			$r=ibase_fetch_object($query);
			if (isset($r)) { if (isset($r->IP)) {
				if ($r->IP!="") {
					$s.=strval($r->IP);
				}
			} }
		} }
	}
	return $s;
}

} ?>

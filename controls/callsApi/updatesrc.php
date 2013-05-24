<?php class updatesrc {

function getCmd(&$q) { $n="\r\n";
	$this->ms=array();
	$this->ms['cmd']="updatesrc";
	$this->ms['return']=$this->getClid($q);
	echo json_encode($this->ms);
	if ($q->url->t) { echo $n; }
}

function getClid(&$q) { 
	if (isset($q->db)) {
		$sql=$q->sql_updatesrc->getClid();
		$query=mysql_query($sql,$q->db);
		if (isset($query)) { if ($query) {
			$r=mysql_fetch_object($query);
			if (isset($r)) { if ((isset($r->clid)) && (isset($r->id))) {
				if ($r->clid!="") {
					return $this->updSrc($q,$r->id,$r->clid);
				}
			} }
		} }
	}
	return false;
}

function updSrc(&$q,$id="",$clid="") {
	if (isset($q->db)) {
		if (($id!="") && ($clid!="")) {
			$clid=trim($clid);
			$src=preg_replace('/\"(.*)\"(.*)<(.*)>/i','$1',$clid);
			$src=trim($src);
			$this->ms["id"]=$id;
			$this->ms["src"]=$src;
			$this->ms["clid"]=$clid;
			$json=json_encode($this->ms);
			$sql=$q->sql_updatesrc->updSrc($id,$src,$json);
			$query=mysql_query($sql,$q->db);
			if (isset($query)) { if ($query) {
				return true;
			} }
		}
	}
	return false;
}


} ?>

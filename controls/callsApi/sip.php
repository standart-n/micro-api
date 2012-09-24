<? class sip {

function getSipNumbersByUserId(&$q) { $s=""; $i=-1; $ms=array();
	foreach (explode(",",$q->url->msOfId) as $user_id) {
		$q->validate->urlInt($user_id);
		$sql=$q->sql_sip->getSipNumbersByUserId($q,$user_id);
		$query=ibase_query($q->fdb_it,$sql);
		if (isset($query)) { if ($query) {
			$this->getDataFromUserComp($q,$query,$ms,$i);
		} }
	}
	$s.=$this->showResult($q,$ms,$i);
	return $s;
}

function getSipNumbersByProfileId(&$q) { $s=""; $i=-1; $ms=array();
	foreach (explode(",",$q->url->msOfId) as $profile_id) {
		$q->validate->urlInt($profile_id);
		$sql=$q->sql_sip->getSipNumbersByProfileId($q,$profile_id);
		$query=ibase_query($q->fdb_it,$sql);
		if (isset($query)) { if ($query) {
			$this->getDataFromUserComp($q,$query,$ms,$i);
		} }
	}
	$s.=$this->showResult($q,$ms,$i);
	return $s;
}

function getSipNumbersByUserName(&$q) { $s=""; $i=-1; $ms=array();
	foreach (explode(",",$q->url->msOfNames) as $user) {
		$user=$q->validate->toWin($user);
		$q->validate->urlStr($user);
		$sql=$q->sql_sip->getSipNumbersByUserName($q,$user);
		$query=ibase_query($q->fdb_it,$sql);
		if (isset($query)) { if ($query) {
			$this->getDataFromUserComp($q,$query,$ms,$i);
		} }
	}
	$s.=$this->showResult($q,$ms,$i);
	return $s;
}

function getSipNumbersByProfileName(&$q) { $s=""; $i=-1; $ms=array();
	foreach (explode(",",$q->url->msOfNames) as $profile) {
		$profile=$q->validate->toWin($profile);
		$q->validate->urlStr($profile);
		$sql=$q->sql_sip->getSipNumbersByProfileName($q,$profile);
		$query=ibase_query($q->fdb_it,$sql);
		if (isset($query)) { if ($query) {
			$this->getDataFromUserComp($q,$query,$ms,$i);
		} }
	}
	$s.=$this->showResult($q,$ms,$i);
	return $s;
}


function showResult(&$q,$ms,$i) { $s=""; $n="\r\n";
	if (in_array($q->url->res,array("phone","id","user","userid","profile","profile_id","date","res","count"))) {
		switch ($q->url->res) {
			case "count":
				$s.=strval($i+1);
			break;
			default:
				if ($q->url->inc==-100) { 
					$s.=implode($n,$ms[$q->url->res]);
				} else {
					if (intval($q->url->inc)<=intval($i)) {
						$s.=$ms[$q->url->res][$q->url->inc];
					} else {
						$s.="END_OF_QUEUE";
					}
				}
		}
	}
	return $s;
}

function getDataFromUserComp(&$q,$query,&$ms,&$i) { 
	while ($r=ibase_fetch_object($query)) { $i++;
		if (isset($r)) { 
			$ms["phone"][$i]=intval($r->PHONE);
			$ms["id"][$i]=intval($r->USER_ID);
			$ms["userid"][$i]=intval($r->USER_ID);
			$ms["user"][$i]=$q->validate->toUTF(trim(strval($r->SUSER)));
			$ms["profileid"][$i]=intval($r->USER_ID);
			$ms["profile"][$i]=$q->validate->toUTF(trim(strval($r->SPROFILE)));
			$ms["date"][$i]=strval($r->TRUNC_DATE);
			$ms["res"][$i]=strval($r->PHONE_RES);
		}
	}
}

} ?>

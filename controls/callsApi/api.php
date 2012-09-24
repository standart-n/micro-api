<? class api {

function engine(&$q) { $n="\r\n";
	if (isset($q->url->cmd)) {
		if ($q->url->cmd=="sip") {
			if (($q->url->mode=="pid") || ($q->url->mode=="profileid")) {
				echo $q->sip->getSipNumbersByProfileId($q);
			}
			if (($q->url->mode=="p") || ($q->url->mode=="profile")) {
				echo $q->sip->getSipNumbersByProfileName($q);
			}
			if (($q->url->mode=="uid") || ($q->url->mode=="userid")) {
				echo $q->sip->getSipNumbersByUserId($q);
			}
			if (($q->url->mode=="u") || ($q->url->mode=="user")) {
				echo $q->sip->getSipNumbersByUserName($q);
			}
		}
		if (($q->url->cmd=="help") || ($q->url->cmd=="h")) {
			echo $this->showHelp($q);
		}
		if ($q->url->cmd=="info") {
			//phpinfo(32);
		}

	} 
	if ($q->url->t) { echo $n; }
}

function showHelp(&$q) { $s="";
	$s.=$q->tpl_api->help($q);
	return $s;
}

} ?>

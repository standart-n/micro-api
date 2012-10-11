<? class api {

function engine(&$q) { $n="\r\n";
	if (isset($q->url->cmd)) {
		if ($q->url->cmd=="sip") {
			$q->sip->getCmd($q);
		}
		if ($q->url->cmd=="msg") {
			$q->msg->getCmd($q);
		}
		if ($q->url->cmd=="getip") {
			$q->getip->getCmd($q);
		}
		if ($q->url->cmd=="updatesrc") {
			$q->updatesrc->getCmd($q);
		}
		if (($q->url->cmd=="help") || ($q->url->cmd=="h")) {
			echo $this->showHelp($q);
		}
		if ($q->url->cmd=="info") {
			//phpinfo(32);
		}
	} 
}

function showHelp(&$q) { $s="";
	$s.=$q->tpl_api->help($q);
	return $s;
}

} ?>

<?php class start {

function engine(&$q) {
	if ($this->init($q)) {
		$this->url($q);
		$q->api->engine($q);
	}
}

function init(&$q) { $rtn=true;
	if (!$q->base->sql($q,"sip")) $rtn=false;
	if (!$q->base->tpl($q,"api")) $rtn=false;
	if (!$q->base->controls($q,"api")) $rtn=false;
	if (!$q->base->controls($q,"sip")) $rtn=false;
	if (!$q->base->controls($q,"msg")) $rtn=false;
	if (!$q->base->controls($q,"validate")) $rtn=false;
	return $rtn;
}

function url(&$q) { $i=1;
	$q->argv=$_SERVER["argv"]; 
	if (isset($q->argv[1])) { $q->url->cmd=strval($q->argv[1]); } else { $q->url->cmd="NULL"; }
	$q->validate->edit($q->url->cmd);
		if ($q->url->cmd=="sip") { $i=1;
			while (isset($q->argv[$i+1])) { $i++;
				$param=strval($q->argv[$i]);
				$q->validate->edit($param);
				if (($param=="get") || ($param=="g")) {
					if (isset($q->argv[$i+1])) {
						$value=strval($q->argv[$i+1]);
						$q->validate->edit($value);
						$q->url->res=$value;
					}				
				}
				if (($param=="pid") || ($param=="profileid") || ($param=="uid") || ($param=="userid")) {
					$q->url->mode=$param;
					if (isset($q->argv[$i+1])) {
						$value=strval($q->argv[$i+1]);
						$q->validate->edit($value);
						$q->url->msOfId=$value;
					}				
				}
				if (($param=="p") || ($param=="profile") || ($param=="u") || ($param=="user")) {
					$q->url->mode=$param;
					if (isset($q->argv[$i+1])) {
						$value=strval($q->argv[$i+1]);
						$q->validate->edit($value);
						$q->url->msOfNames=$value;
					}				
				}
				if (($param=="inc") || ($param=="i")) {
					if (isset($q->argv[$i+1])) {
						$value=intval($q->argv[$i+1]);
						$q->url->inc=$value;
					}				
				}
				if ($param=="t") {
					$q->url->t=true;
				}
				if (!isset($q->url->t)) { $q->url->t=false; }	
			}
			if (!isset($q->url->res)) { $q->url->res="phone"; }
			if (!isset($q->url->mode)) { $q->url->mode="pid"; }
			if (!isset($q->url->inc)) { $q->url->inc=-100; }
			if (!isset($q->url->msOfId)) { $q->url->msOfId="0"; }
			if (!isset($q->url->msOfNames)) { $q->url->msOfNames="0"; }
		}
		if ($q->url->cmd=="msg") { $i=1;
			while (isset($q->argv[$i+1])) { $i++;
				$param=strval($q->argv[$i]);
				$q->validate->edit($param);
				if (($param=="str") || ($param=="s")) {
					if (isset($q->argv[$i+1])) {
						$value=strval($q->argv[$i+1]);
						$q->validate->edit($value);
						$q->url->str=$value;
					}				
				}
				if (($param=="ip")) {
					if (isset($q->argv[$i+1])) {
						$value=strval($q->argv[$i+1]);
						$q->validate->edit($value);
						$q->url->ip=$value;
					}				
				}
				if (($param=="port") || ($param=="p")) {
					if (isset($q->argv[$i+1])) {
						$value=strval($q->argv[$i+1]);
						$q->validate->edit($value);
						$q->url->port=intval($value);
					}				
				}
			}
			if (!isset($q->url->str)) { $q->url->str="standart-n"; }
			if (!isset($q->url->ip)) { $q->url->ip="127.0.0.1"; }
			if (!isset($q->url->port)) { $q->url->port=80; }
		}
}

} ?>

<?php class validate {

function ast($s) { 
	$s=trim($s);
	return $s;
}

function delSqlWords($a) { $s=$a;
	foreach (array("insert","delete","from","update","into","where","drop","dump","select","\*","\;") as $key) {
		$s=preg_replace("/".$key."/i","",$s);
	}
	return $s;
}

function rmTags($a) { $s=$a;
	//$s=preg_replace("/<(?:([a-zA-Z\?][\w:\-]*)(\s(?:\s*[a-zA-Z][\w:\-]*(?:\s*=(?:\s*\"(?:\\"|[^\"])*\"|\s*'(?:\\'|[^'])*'|[^\s>]+))?)*)?(\s*[\/\?]?)|\/([a-zA-Z][\w:\-]*)\s*|!--((?:[^\-]|-(?!->))*)--|!\[CDATA\[((?:[^\]]|\](?!\]>))*)\]\])>/i","",$s);
	return $s;
}

function toUTF($a) { $s="";
	$s.=trim(iconv("cp1251","UTF-8",$a));
	return $s;
}

function toWin($a) { $s="";
	$s.=trim(iconv("UTF-8","cp1251",$a));
	return $s;
}

function urlInt(&$id) {
	$id=intval(trim($this->rmTags($id)));	
}

function edit(&$s) {
	//$s=strtolower($s);
	$s=preg_replace("/-/","",$s);
	$s=preg_replace("/'/","",$s);
	$s=preg_replace('/"/',"",$s);
}

function urlStr(&$s) {
	$s=trim(strval($s));
	$s=stripslashes($s);
	$s=$this->rmTags($s);
	$s=$this->delSqlWords($s);
	if (strlen($s)>255) { $s=substr($s,0,255); }	
}


} ?>

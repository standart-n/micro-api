<? class tpl_api {

function help($q) { $s=""; $n="\r\n";
	$s.=$n;
	$s.="SIP API v1.0 - (C) 2012 www.standart-n.ru".$n.$n;
	$s.="USAGE:".$n;
	$s.=$n;
	$s.="sip - command for get SIP info from FireBird".$n;
	//$s.="<what return (phone,id,user,profile,profileid,count,date)> [[-]pid <massive of id>] [[-]p <massive of names>] [[-]increment]".$n;
	$s.="example: php5 api.php sip -g phone -pid 2,3,5 --t".$n;
	$s.="example: php5 api.php sip get user profileid 2,3,5 -inc 1 -t".$n;
	$s.=$n;
	return $s;
}

} ?>

<? class sql_getip {

function getIpByPhone($phone){ $s="";
	$s.="select wp.ip as IP ";
	$s.="from vw_wst_phone wp ";
	$s.="where (1=1) ";
	$s.="and (wp.phone='".$phone."') ";
	$s.="and (wp.status<>-1) ";
	return $s;
}

} ?>

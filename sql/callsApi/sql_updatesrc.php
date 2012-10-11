<? class sql_updatesrc {

function getClid(){ $s="";
	$s.="SELECT * FROM cdr ";
	$s.="WHERE (1=1) ";
	$s.="ORDER by id DESC ";
	return $s;
}

function updSrc($id,$src) { $s="";
	$s.="UPDATE cdr ";
	$s.="SET src='".$src."' ";
	$s.="WHERE (id=".$id.") ";
	$s.="LIMIT 1 ";
	return $s;
}

} ?>

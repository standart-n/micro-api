<?php class sql_sip {

function getSipNumbersByProfileId($q,$profile_id){ $s="";
	$s.="SELECT * FROM VW_USER_COMP WHERE (1=1) ";
	$s.="AND (PROFILE_ID=".$profile_id.") ";
	$s.="AND (TRUNC_DATE=current_date) ";
	$s.="ORDER by TRUNC_DATE DESC";
	return $s;
}

function getSipNumbersByProfileName($q,$profile){ $s="";
	$s.="SELECT * FROM VW_USER_COMP WHERE (1=1) ";
	$s.="AND (SPROFILE CONTAINING '".$profile."') ";
	$s.="AND (TRUNC_DATE=current_date) ";
	$s.="ORDER by TRUNC_DATE DESC";
	return $s;
}

function getSipNumbersByUserId($q,$user_id){ $s="";
	$s.="SELECT * FROM VW_USER_COMP WHERE (1=1) ";
	$s.="AND (USER_ID=".$user_id.") ";
	$s.="AND (TRUNC_DATE=current_date) ";
	$s.="ORDER by TRUNC_DATE DESC";
	return $s;
}

function getSipNumbersByUserName($q,$user){ $s="";
	$s.="SELECT * FROM VW_USER_COMP WHERE (1=1) ";
	$s.="AND (SUSER CONTAINING '".$user."') ";
	$s.="AND (TRUNC_DATE=current_date) ";
	$s.="ORDER by TRUNC_DATE DESC";
	return $s;
}


} ?>

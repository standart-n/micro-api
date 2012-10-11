<?php class pl_baseMySQL {

function engine(&$q) {
	if ((isset($q->host)) && (isset($q->login)) && (isset($q->password)) && (isset($q->dbname))) {
		if (($q->host!="") && ($q->login!="") && ($q->password!="") && ($q->dbname!="")) {
			$q->db=mysql_pconnect($q->host,$q->login,$q->password);
			mysql_select_db($q->dbname);
			$set=mysql_query('SET NAMES UTF8',$q->db);
		}
	}
}

} ?>

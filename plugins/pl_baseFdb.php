<?php class pl_baseFdb {

function engine(&$q) {
	if ((isset($q->fdb_dbname)) && (isset($q->fdb_login)) && (isset($q->fdb_password))) {
		if (($q->fdb_dbname!="") && ($q->fdb_login!="") && ($q->fdb_password!="")) {
			$q->fdb_db=@ibase_connect($q->fdb_dbname,$q->fdb_login,$q->fdb_password);
			if (isset ($q->fdb_db)) {
				$q->fdb_it=@ibase_trans(IBASE_WRITE+IBASE_COMMITTED+IBASE_REC_VERSION+IBASE_NOWAIT,$q->fdb_db);
			}
		}
	}
}

} ?>

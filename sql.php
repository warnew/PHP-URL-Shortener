<?
// won't use any external libs, as we onlu need just a few functions
// so it's not worth the dependency



function sql_connect() {
   if (DB_TYPE == 'postgresql') {
      pg_connect("password=".DB_PASSWORD." host=".DB_HOST." dbname=".DB_NAME." user=".DB_USER);
      return;
   }
   if (DB_TYPE == 'mysql') {
      mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
      mysql_select_db(DB_NAME);
      return;
   }
   die("Please choose a database type!");
}

function sql_lock($table,$mode) {
   if (DB_TYPE == 'postgresql') {
      pg_query('begin work'); // yeah, i dont know what that lock table stuff is about :)
      return;
   }
   if (DB_TYPE == 'mysql') {
      mysql_query('LOCK TABLES '. $table .' '. $mode);
      return;
   }
}

function sql_unlock() {
   if (DB_TYPE == 'postgresql') {
      pg_query('commit work;');
      return;
   }
   if (DB_TYPE == 'mysql') {
      mysql_query('UNLOCK TABLES ');
      return;
   }
}

function sql_insert($query) {
   if (DB_TYPE == 'postgresql') {
      $res = pg_query($query); 
      if (pg_result_status($res) == PGSQL_COMMAND_OK) {
         $res = sql_result('select lastval();',0,0); // lastval() is available in PostgreSQL versions >=8.1 
         return $res;
      }
      return -1;
   }
   if (DB_TYPE == 'mysql') {
      mysql_query($query);
      return mysql_insert_id();
   }
}

function sql_escape_string($q) {
   if (DB_TYPE == 'postgresql') {
      return pg_escape_string($q);
   }
   if (DB_TYPE == 'mysql') {
      return mysql_real_escape_string($q);
   }
}

function sql_query($q) {
   if (DB_TYPE == 'postgresql') {
      pg_query($q);
      return;
   }
   if (DB_TYPE == 'mysql') {
      mysql_query($q);
      return;
   }
}

function sql_result($q,$r,$f) {
   if (DB_TYPE == 'postgresql') {
      $res = pg_query($q);
      return pg_fetch_result($res,$r,$f);
   }
   if (DB_TYPE == 'mysql') {
      $res = mysql_query($q);
      return mysql_result($res,$r,$f);;
   }
}

?>

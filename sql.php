<?
// won't use any external libs, as we onlu need just a few functions
// so it's not worth the dependency



sql_connect() {
   if (DB_TYPE == 'postgreql') {
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

?>

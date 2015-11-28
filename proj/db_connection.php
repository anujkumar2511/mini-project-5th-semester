<?php
$db_connection = mysql_connect("localhost","root","") or die("Could not connect to DB.");
mysql_select_db ("population", $db_connection) or die("Could not find DB."); 
/*$db_connection = mysql_connect("localhost","econurtu_grm","Bizness1234") or die("Could not connect to DB.");
mysql_select_db ("econurtu_grftp", $db_connection) or die("Could not find DB.");*/
?>
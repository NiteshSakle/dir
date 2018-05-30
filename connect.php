<?php
session_start();

$host    = "localhost"; // Host name
$db_name = "library";		// Database name
$db_user = "root";		// Database user name
$db_pass = "";			// Database Password

$con = mysql_connect($host,$db_user,$db_pass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("library", $con);

?>
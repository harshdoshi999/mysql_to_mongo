<?php
	/*
	* Developer by: Harsh Doshi
	* License: MIT license
	*/
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$host = "localhost";	// mysql hostname
	$user = "root";			// mysql username
	$pass = "";				// mysql password
	$dbname = "mongodb";	// mysql dbname
	$table = "users";		// tablename
	$fields = implode(',',array(''));
	if(strlen($fields)){
		// Do nothing.
	} else{
		$fields = "*";
	}
	
	$conn = mysql_connect($host,$user,$pass);
	$db = mysql_select_db($dbname,$conn);
	$sql = "SELECT {$fields} FROM {$table}";
	$sql_exe = mysql_query($sql);
	echo "<h1>Run following commands into mongodb shell</h1><br>";
	echo "<hr><code>";
	echo "use {$dbname}<br>";flush();
	while($result = mysql_fetch_assoc($sql_exe)){
		echo "db.{$table}.insert(".json_encode($result).")<br>";flush();
	}
	echo "</code><hr>";
	echo "<br>";
	exit('Complete!');

?>
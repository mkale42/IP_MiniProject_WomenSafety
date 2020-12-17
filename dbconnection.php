<?php
	global $conn;  

	$dbhost = 'sql203.epizy.com';
	$dbuser = 'epiz_27479218';
	$dbpassword = '2WHoNQYnWMa';
	$db = 'epiz_27479218_womensafety';

	$conn = new mysqli($dbhost, $dbuser, $dbpassword,$db) or die("Connect failed: %s\n". $conn -> error);
?>
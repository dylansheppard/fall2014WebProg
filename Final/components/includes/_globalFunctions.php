<?php
ini_set('display_errors', 1);
date_default_timezone_set("America/New_York");

function GetConnection() 
{
	include __DIR__ . '/_password.php';
	return new mysqli('localhost', 'n02395809',$sql_pw, 'n02395809_db');
}

function FetchAll($sql)
{
	$ret = array();
	$conn = GetConnection();
	$results = $conn->query($sql);
	
	$error = $conn->error;
	
	if ($error){
		echo $error;
	}
	else 
	{
		while($res = $results->fetch_assoc())
			$ret[] = $res;
	}
	
	return $ret;
	
}

function my_print($x)
{
	?><pre><?
		print_r($x);
		?></pre><?
}

function escape_all($row, $conn)
{
	$row2 = array();
	foreach($row as $key => $value)
	{
		$row2[$key] = $conn->real_escape_string($value);
	}
	return $row2;
}

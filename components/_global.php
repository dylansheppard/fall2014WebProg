<?php

function GetConnection(){
	include __DIR__ . '/_password.php' //make this later DON'T SHARE THAT FILE IN GITHUB
	$connect = new mysqli('localhost', 'n02395809',$sql_password,'n02395809_db'); //never post pw to public file that'll be on Git
	return $connect;
}

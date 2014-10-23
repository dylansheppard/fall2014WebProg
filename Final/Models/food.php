<?php

/**
 * 
 */
class Food {
	
	public static function Get($id=null) //  <--- default variable
	{
		$connect == GetConnection();
		$sql = " SELECT * FROM 2014_FALL"; //target variable
		$result = $connect->query($sql);
		$arr = array();
		while($x = $result->fetch_assoc())
		{
			$arr[] = $x; //pushs current $x to array, similar to a Stack
		}
		$connect->close();  //always close connection as soon as possible
		return $arr;
	}
	
}

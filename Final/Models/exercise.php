

<?php

include_once __DIR__ . '/../components/includes/_all.php';

class Exercise {
	public static function Blank()
	{
		return array('id'=>null,'Name'=>null, 'Calories'=>null, 'Protein' => null, 'Fat' => null, 'Carbs' => null, 'Fiber' => null, 'Time' => date(strtotime('tomorrow')), 'isFave' => null);
	}
	
	public static function Get($id=null)
	{
	
		
		
		$sql = " SELECT * FROM 2014Fall_Exercise";
		
		if($id){
			$sql .= " WHERE id=$id ";
			
			$ret = FetchAll($sql);
			
			return $ret[0];
		}
		else{
			return FetchAll($sql);
		}
		
		
	}
	
//& means we are passing by reference, meaning the row variable will be altered by this method each time it's called
	public static function Save(&$row)
	{
		$conn = GetConnection();
		$row2 = escape_all($row,$conn);
		$row2['Time'] = date('Y-m-d H:i:s', strtotime($row2['Time']));
		//if the row is not empty, we are editing it:
		if(!empty($row['id']) && ($row['isFave'] == 0)) {
			$sql = "Update 2014Fall_Exercise
					Set Name='$row2[Name]', Weight = '$row2[Weight]', Rep = '$row2[Rep]', Time = '$row2[Time],
				   isFave = '$row2[isFave]'
					WHERE id = $row2[id]
					";
					my_print($sql);
					
		}
		//otherwise, we are inserting all new data into this row.
		else{
			$sql = "INSERT INTO 2014Fall_Exercise (
						
						`created_at` ,
						 
						`Name` ,
						`Weight` ,
						`Reps` ,
						`Time` ,
						`UserID` ,
						`isFave`
						)
						VALUES (
						Now(),  '$row2[Name]', '$row2[Weight]','$row2[Reps]','$row2[Time]',1,'$row2[isFave]')";
						

			
		}

 		my_print($sql);
 		print_r($row2);  
		// -> used to call instances
		$results = $conn->query($sql);
		$error = $conn->error;
		
		if (!error && empty($row['id']))
			$row['id'] = $conn->insert_id;
			
			
			//always close connection ASAP
			$conn->close();
			return $error ? array('sql error' => $error): false;
	}

	public static function Delete($id)
	{
		$conn = GetConnection();
		$sql = "DELETE FROM 2014Fall_Exercise WHERE id = $id";
		echo $sql;
		$results = $conn->query($sql);
		$error = $conn->error;
		$conn->close();
		
		return $error ? array('sql error' => $error): false;
	}

	public static function Validate($row)
	{
		$errors = array();
		
		if (empty($row['Name']))
			$errors['Name'] = "please enter a name";
		if (empty($row['Weight']))
			$errors['Weight'] = "please enter a weight amount";
		if ($row[Weight] > 1000)
			$errors['Weight'] = "exceeded weight limit. Surely, you made a mistake?";
		if (empty($row['Reps']))
			$errors['Protein'] = "please enter a rep amount";
		
		
		return count($errors) > 0 ? $errors	: false;	
	}
}


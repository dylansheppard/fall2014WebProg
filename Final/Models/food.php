<?php

include_once __DIR__ . '/../components/globalIncludes';

class Food {
	public static function Blank()
	{
		return array('id'=>null,'Name'=>null, 'Calories'=>null, 'Protein' => null, 'Fat' => null, 'Carbs' => null, 'Fiber' => null, 'Time' => date(strtotime('tomorrow')));
	}
	
	public static function Get($id=null)
	{
		$sql = " Select E.*, T.Name as T_Name
				 FROM 2014Fall_Food E ";
				 
		if ($id) {
			$sql .= " WHERE E.id=$id";
			$result = FetchAll($sql);
			return $result[0];
		}
		else 
			return FetchAll($sql);
	}
	
//& means we are passing by reference, meaning the row variable will be altered by this method each time it's called
	public static function Save(&$row)
	{
		$conn = GetConnection();
		$row2 = escape_all($row,$conn);
		$row2['Time'] = date('Y-m-d H:i:s', strtotime($row2['Time']));
		//if the row is not empty, we are editing it:
		if(!empty($row['id'])) {
			$sql = "Update 2014Fall_Food
					Set Name='$row2[Name]', Calories = '$row2[Calories]', Protein = '$row2[Protein]', Fat = '$row2[Fat], Carbs = '$row2[Carbs]', Fiber = '$row2[Fiber]', Time = '$row2[Time]'
					WHERE id = $row2[id]";
					
		}
		//otherwise, we are inserting all new data into this row.
		else{
			$sql = "INSERT INTO 2014Fall_Food(Name,Calories,Protein,Fat,Carbs,Fiber,Time,created_at,UserID)
				   VALUES('$row2[Name]','$row2[Calories]','$row2[Protein]','$row2[Fat]','$row2[Carbs]','$row2[Fiber]','$row2[Time]',Now(),1)";
		}

 		my_print($sql);
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
		$sql = "DELETE FROM 2014Fall_Food WHERE id = $id";
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
		if (empty($row['Calories']))
			$errors['Calories'] = "please enter a calorie amount";
		if ($row[Calories] > 3000)
			$errors['Calories'] = "exceeded calorie limit. Surely, you made a mistake?";
		if (empty($row['Protein']))
			$errors['Protein'] = "please enter a protein amount";
		if ($row['Fat'] > 100)
			$errors['Fat'] = "unless your last meal was pure lard, I think you've made an error.";
		if (empty($row['Carbs']))
			$errors['Carbs'] = "please enter amount of carbs.";
		
		return count($errors) > 0 ? $errors	: false;	
	}
}


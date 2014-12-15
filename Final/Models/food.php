
<?php

include_once __DIR__ . '/../components/includes/_all.php';

class Food {
	public static function Blank()
	{
		return array('id'=>null,'Name'=>null, 'Calories'=>null, 'Protein' => null, 'Fat' => null, 'Carbs' => null, 'Fiber' => null, 'Time' => date(strtotime('tomorrow')), 'isFave' => null);
	}
	
	public static function Get($id=null)
	{
	
		
		
		$sql = " SELECT * FROM 2014Fall_Food";
		
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
	static public function Save(&$row)
	{
		$conn = GetConnection();
		$row2 = escape_all($row,$conn);
		$row2['Time'] = date('Y-m-d H:i:s', strtotime($row2['Time']));
		//if the row is not empty, we are editing it:
		if(!empty($row['id']) && $row2['isFave'] == 0) {
			$sql = "Update 2014Fall_Food
					Set Name='$row2[Name]', Calories = '$row2[Calories]', Protein = '$row2[Protein]', Fat = '$row2[Fat],
					 Carbs = '$row2[Carbs]', Fiber = '$row2[Fiber]', Time = '$row2[Time]', isFave = '$row2[isFave]'
					WHERE id = '$row2[id]'
					";
					my_print($sql);
					
		}
		//otherwise, we are inserting all new data into this row.
		else{
			$sql = "INSERT INTO 2014Fall_Food
			(Name, Calories, Protein, Fat, Carbs, Fiber, Time, created_at UserID, isFave)
				   VALUES('$row2[Name]','$row2[Calories]','$row2[Protein]','$row2[Fat]','$row2[Carbs]','$row2[Fiber]','$row2[Time]',Now(),1, '$row2[isFave]')";
		}

 		my_print($sql);
 		print_r($row2);  
		// -> used to call instances
		$results = $conn->query($sql);
		$error = $conn->error;
		
		if (!error && empty($row['id'])){
			$row['id'] = $conn->insert_id;
		}
			
			
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


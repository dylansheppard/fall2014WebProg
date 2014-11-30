<?
	include_once __DIR__ . '/../components/includes/_all.php';
//will we be creating, saving, editing, or deleting?	
$action = isset($_REQUEST['action']) ? $_REQUEST['action']: null;
//are we saving it? or simply "getting" it?
$method = $_SERVER['REQUEST_METHOD']? 'POST' : 'GET';

$format = isset($_REQUEST['format']) ? $_REQUEST['format']: 'web';
// view will be declared after we figure out what type of view is needed
$view = null;

switch($action . '_' . $method) {
	case 'create_GET':
		$model = Food::Blank();
		$view = "food/edit.php";
		break;
		
	case 'save_POST':
		//if current field is empty, we are creating one, otherwise we are just updating it
		$sub_action = empty($_REQUEST['id']) ? 'created' : 'updated';
		$errors = Food::Validate($_REQUEST);
		if(!$errors){
			$errors = Food::Save($_REQUEST);
		
			if ($format == 'json')
				header("Location: ?action=edit&format=json&id=$_REQUEST[id]");
			
			else 
				header("Location: ?sub_action=$sub_action&id=$_REQUEST[id]");
			die();
			
		}
		else{
			my_print($errors);
			$model = $_REQUEST;
			$view = "food/edit/php";
		}
		break;
		
	case 'edit_GET':
		$model = Food::Get($_REQUEST['id']);
		$view = "food/delete.php";
		break;
		
	case 'delete_POST':
		$errors = Food::Delete($_REQUEST['id']);
		if ($errors){
			$model = Food::Get($_REQUEST['id']);
			$view = 'food/delete.php';
			}
		else {
			header("Location: ?sub_action=$sub_action&id=$_REQUEST[id]");
			die();
		}
		break;
		
	case'index_GET':
	default:
		$model = Food::Get();
		$view = 'food/index.php';
		break;
}//end switch

switch($format) {
	case 'json':
		echo json_encode($model);
		break;
		
	case 'plain':
		include __DIR__ . "/../Views/$view";
		break;
		
	case 'web':
	default:
		include __DIR__ ."/../Views/shared/_template.php";
		
		break;
}
		
		


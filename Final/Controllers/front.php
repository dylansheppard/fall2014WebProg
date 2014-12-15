
<?
	include_once __DIR__ . '/../components/includes/_all.php';
//will we be creating, saving, editing, or deleting?	
$action = isset($_REQUEST['action']) ? $_REQUEST['action']: null;
//are we saving it? or simply "getting" it?
$method = $_SERVER['REQUEST_METHOD'];

$format = isset($_REQUEST['format']) ? $_REQUEST['format']: 'web';
// view will be declared after we figure out what type of view is needed
$view = null;

switch($action . '_' . $method) {
	
	default:
		
		$view = 'front/index.php';
		break;
}

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
		
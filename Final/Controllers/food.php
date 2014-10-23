<?

include __DIR__ . '/../../components/_all.php';
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;






//how we are going to format our view
switch($format) {
	case 'json':
		echo json_encode($value);
		break;
		
	case 'plain':
		include __DIR__. "/../Views/$view";
		break;
		
	case 'web':
	default:
		include __DIR__ . "/../Views/shared/_template.php";
		break;
}

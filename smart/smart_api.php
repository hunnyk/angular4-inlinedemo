<?php

$conn = mysqli_connect('localhost','root','root','userdb');
include_once('smart.php');

header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');

$data = json_decode(file_get_contents("php://input"));

$regg = new Registers;

switch($_REQUEST['action'])
{
    case 'getall':
    	$regg->getAllReg();
    break;
    case 'getid':
    	$regg->getRegById($data);
    break;
	case 'save':
	    $regg->saveReg($data);
	break;
	case 'delete':
	    $regg->deleteReg($data);
	break;
	case 'edit':
	    $regg->updateReg($data);
	break;
	default:
	    header("HTTP/1.0 405 Method Not Allowed");
	break;
}
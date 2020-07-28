<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once 'config.php';
require_once 'Agent.php';

//$data = json_decode(file_get_contents("php://input"));
$instance = Config::getInstance();
$db = $instance->getConnection();
$agent_id = $_GET['agent'];
//echo json_encode($agent_id);

if(
    !empty($agent_id)
){
    $agent = new Agent($db);
//    $agent->agent_id = $agent_id;
    $temp = $agent->getDetails($agent_id);
    if($temp){
        echo json_encode($temp);
    }
    else{
        echo json_encode("Couldn't do it");
    }

}

<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once 'config.php';
require_once 'Agent.php';

//$agent_id = htmlspecialchars($_POST['agentId']);
$data = json_decode(file_get_contents("php://input"));
$instance = Config::getInstance();
$db = $instance->getConnection();
if (isset($_POST["agent"])) {
    $agent_id = htmlspecialchars($_POST["agent"]);
    echo json_encode(array("asd" => $agent_id));
} // not working so added agent_id in POST request body

if(
    !empty($data->agent_id) &&
    !empty($data->title) &&
    !empty($data->description) &&
    !empty($data->category) &&
    !empty($data->due_date)
){
    $agent = new Agent($db);
//    $agent->agent_id = $agent_id;
//    $temp = ;
    if($agent->addDetails($data->agent_id,$data->title , $data->description, $data->category, $data->due_date)){
        echo json_encode( array("status"=>"success","status_code" => 200) );
    }
    else{
        echo json_encode("Couldn't do it");
    }

}


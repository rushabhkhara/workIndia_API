<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    require_once 'config.php';
    require_once 'Agent.php';

    $data = json_decode(file_get_contents("php://input"));
    $instance = Config::getInstance();
    $db = $instance->getConnection();

    if(
        !empty($data->agent_id) &&
        !empty($data->password)
    ){
        $agent = new Agent($db);
        $agent->agent_id = $data->agent_id;
        $agent->password = $data->password;
        if($agent->addAgent()){
            echo json_encode( array("status"=>"account created","status_code" => 200) );
        }
        else{
            echo json_encode("Couldn't do it");
        }

    }

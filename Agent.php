<?php

class Agent
{
    private $conn;
    public $agent_id;
    public $password;
    private $agentTable = "users";
    private $todoTable = "todo";
    private $data;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    function addAgent()
    {
        $hash = password_hash($this->password, PASSWORD_BCRYPT) ;
        $query = "INSERT INTO $this->agentTable (agent_id,password) VALUES (:agentId, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":agentId",$this->agent_id);
        $stmt->bindParam(":password",$hash);
        if ($stmt->execute()){
            return true;
        }
        else{
            return false;
        }

    }
    function verifyAgent()
    {
        $query = "SELECT agent_id,password from $this->agentTable WHERE agent_id = :agent_id " ;
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":agent_id",$this->agent_id);
//        $stmt->bindParam(":password",$this->password);
        $stmt->execute();
        $temp = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($temp == NULL){
            return NULL;
        }
        else{
            if(password_verify($this->password,$temp['password']))
            {
                return $temp;
            }
            else{
                return NULL;
            }

        }
    }
    function getDetails($agent_id){
        $query = "SELECT title, description, category, due_date FROM $this->todoTable WHERE agent_id = :agent_id ORDER BY due_date" ;
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":agent_id",$agent_id);

        if (!$stmt->execute()){
            return NULL;
        }
        else{
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $this->data[] = $row;
            }
            return $this->data;

        }


    }

    function addDetails($agent_id, $title, $description, $category, $due_date){
        $query = "INSERT INTO $this->todoTable (agent_id, title,  category, description, due_date) VALUES (:agent_id, :title,:category, :description, :due_date)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":agent_id",$agent_id);
        $stmt->bindParam(":title",$title);
        $stmt->bindParam(":category",$category);
        $stmt->bindParam(":description",$description);
        $stmt->bindParam(":due_date",$due_date);
        if ($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }
}
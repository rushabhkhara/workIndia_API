## WorkIndia_API

# TechStack 
PHP REST APIs used, Postman for testing APIs, bcrypt used for encryption

# Urls
http://localhost/workIndia/add_user.php [POST]<br>

Request body:
{
    "agent_id" : 1",   
    "password" : "12134"
}
Response:
{
    "status":"account created",
    "status_code" : 200
}


http://localhost/workIndia/login.php [POST]<br>
Request body:
{
    "agent_id" : 1",   
    "password" : "12134"
}

http://localhost/workIndia/addTodo.php?agent=1 [POST] <br>
Request body: 
{
    "agent_id" : 1",
    "title":"Hieiei",
    "category": "sasdas",
    "description": "asdasfsffas",
    "due_date": "2020-06-10"
}
Response:
{
  "status":"success",
  "status_code" : 200
}

http://localhost/workIndia/getTodo.php?agent=3 [GET]

Response: A list of TODOs


## WorkIndia_API

# TechStack 
PHP REST APIs used, Postman for testing APIs, bcrypt used for encryption

# Urls
http://localhost/workIndia/add_user.php [POST]<br>

Request body: <br>
{ <br>
    "agent_id" : 1",<br>  
    "password" : "12134"<br>
}<br>
Response:<br>
{<br>
    "status":"account created",<br>
    "status_code" : 200<br>
}<br>


http://localhost/workIndia/login.php [POST]<br>
Request body:<br>
{<br>
    "agent_id" : 1",   <br>
    "password" : "12134"<br>
}<br>
Response: (success)<br>
{<br>
    "status":"success", <br>
    "agent_id":3,<br>
    "status_code" : 200<br>
}<br>
(failure)<br>
Response:{<br>
    "status" : "failure",<br>
    "status_code" : 401<br>
}<br>

http://localhost/workIndia/addTodo.php?agent=1 [POST] <br>
Request body: <br>
{<br>
    "title":"Hieiei",<br>
    "category": "sasdas",<br>
    "description": "asdasfsffas", <br>
    "due_date": "2020-06-10"<br>
}<br>
Response:<br>
{<br>
  "status":"success", <br>
  "status_code" : 200<br>
}<br>

http://localhost/workIndia/getTodo.php?agent=3 [GET]<br>

Response: A list of TODOs<br>


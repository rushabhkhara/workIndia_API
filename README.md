## workIndia_API

# TechStack 
PHP REST APIs used, Postman for testing APIs, bcrypt used for encryption

# Urls
http://localhost/workIndia/add_user.php

http://localhost/workIndia/login.php

http://localhost/workIndia/addTodo.php?agent=1 
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

http://localhost/workIndia/getTodo.php?agent=3

Response: A list of TODOs


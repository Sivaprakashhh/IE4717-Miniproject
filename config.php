<?php

//$name = $_POST["name"];
//$cost = filter_input(INPUT_POST, "cost", FILTER_VALIDATE_INT);//will return as a int

$host="localhost";
$dbname="TEX";//name of the Database
$username="root"; //It is recommended to use root only when you do local coding and testing
$password=""; //root's default password is a blank. If any credentials are wrong, an 'access denied' message occurs

$conn = mysqli_connect(hostname: $host, 
                       username: $username, 
                       password: $password, 
                       database: $dbname); //This way is using named arguments by prefixing the name of the arguement. This way it doesnt matter the order you put them in. It returns an object that represents the connection to the database.
//mysqli_connect($host, $username, $password, $dbname); //It must be in this order if you are approaching from this way

//var_dump($name, $message, $priority, $type, $terms); //Note if there is no value in var_dump, a warning will occur. E.G if terms is not checked it will push a NULL and if there is no logic in PHP, a warning will occur.

if (mysqli_connect_errno()){ //checks for connection establishment. 
    die("Connection error:".mysqli_connect_error()); //if there is an error throw this warning.
}
?>
<?php

/*==MYSQLI Object Oriented==*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_management";

$con = new mysqli($servername,$username,$password,$dbname);

if($con->connect_error){
	die("Connection_failed: ".$con->connect_error);
}
?>
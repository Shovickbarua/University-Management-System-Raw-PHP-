<?php
/*Db Connection */
session_start();
require_once('db/connection.php');

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "select email,password from login where email = '$email' and password = '$password'";
    $result = $con->query($sql);
    if($result->num_rows > 0){
        $data = $result->fetch_assoc();
        $_SESSION['email'] = $data['email'];
		$_SESSION['status'] ="Logged In Successfully";
		$_SESSION['status_code'] ="success";
        HEADER('LOCATION:dashboard.php');
    }else{
		HEADER('LOCATION:index.php');
		$_SESSION['status'] ="Your Email or Password Does Not Match";
		$_SESSION['status_code'] ="error";
	}   
}

?>
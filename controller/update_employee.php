<?php
    require "../model/UserService.class.php";
    $username = $_GET['username'];
    $password = $_POST['new_password'];
    $name = $_POST['name'];
    $us = new UserService();
    $result = $us->updateEmployee($username,$password,$name);
    if ($result) {
    	echo 1;
    } else {
    	echo 0;
    }
?>
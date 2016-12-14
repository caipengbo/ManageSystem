<?php
    require "../model/UserService.class.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $flag = 2;
    $us = new UserService();
    $result = $us->insertEmployee($username,$password,$name,$flag);
    if ($result) {
    	echo 1;
    } else {
    	echo 0;
    }
?>
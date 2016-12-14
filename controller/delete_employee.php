<?php
    require "../model/UserService.class.php";
    $username = $_POST['username'];
    $us = new UserService();
    $result = $us->deleteEmployee($username);
    if ($result) {
    	echo 1;
    } else {
    	echo 0;
    }
?>
<?php
    session_start();
    if (isset($_SESSION["username"])) {
    	$username = $_SESSION["username"];
    	$name = $_SESSION["name"];
    	$password = $_SESSION["password"];
    	$flag = $_SESSION["flag"];
    	$arr = array(
    		'username' => $username,
    		'name' => $name,
    		'password' => $password,
    		'flag' => $flag
    		);
    	echo json_encode($arr);
    }
?>

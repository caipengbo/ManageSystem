<?php
    require "../model/UserService.class.php";
    if (isset($_POST['username'])) {
    	$username = $_POST['username'];
	    $newpsw = $_POST['newpsw'];
	    $us = new UserService();
	    $rtn = $us->updatePassword($username,$newpsw);
	    if ($rtn) {
	    	session_start();
	    	$_SESSION["password"] = md5($newpsw);
	    	$arr = array(
	    		'return_num' => 1,
	    		'newpsw' => $_SESSION["password"]
	    		);
	    	echo json_encode($arr);
	    }
	    else{
	    	$arr = array(
	    		'return_num' => 0,
	    		'newpsw' => ""
	    		);
	    	echo json_encode($arr);
	    }
    } else
    	{
	    	$arr = array(
	    		'return_num' => 0,
	    		'newpsw' => ""
	    		);
	    	echo json_encode($arr);
	    }
?>
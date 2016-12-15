<?php
    require "../model/UserService.class.php";
    if (isset($_POST['username'])) {
    	$name = $_POST['name'];
    	$username = $_POST['username'];
	    $newpsw = $_POST['newpsw'];
	    $us = new UserService();
	    $rtn = $us->updateUser($username,$name,$newpsw);
	    if ($rtn) {
	    	session_start();
	    	$_SESSION["name"] = $name;
	    	if (!empty($newpsw)) { //有可能用户没输入新密码，只修改姓名
	    		$_SESSION["password"] = md5($newpsw);
	    	}
	    	$arr = array(
	    		'return_num' => 1,
	    		'new_name'=> $_SESSION["name"],
	    		'newpsw' => $_SESSION["password"]
	    		);
	    	echo json_encode($arr);
	    }
	    else{
	    	$arr = array(
	    		'return_num' => 0,
	    		'new_name'=> $_SESSION["name"],
	    		'newpsw' => ""
	    		);
	    	echo json_encode($arr);
	    }
    } else
    	{
	    	$arr = array(
	    		'return_num' => 0,
	    		'new_name'=> $_SESSION["name"],
	    		'newpsw' => ""
	    		);
	    	echo json_encode($arr);
	    }
?>
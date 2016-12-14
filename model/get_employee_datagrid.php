<?php
	require "UserService.class.php";
	$us = new UserService();
	$res = $us->queryUserInfo();
	echo $res;
?>
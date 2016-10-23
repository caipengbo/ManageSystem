<?php
	require "CommodityService.class.php";
	//用于检索
	$sid = isset($_POST['sid']) ? mysql_real_escape_string($_POST['sid']) : '';
	$starttime = isset($_POST['starttime']) ? mysql_real_escape_string($_POST['starttime']) : '';
	$endtime = isset($_POST['endtime']) ? mysql_real_escape_string($_POST['endtime']) : '';
	$username = isset($_POST['username']) ? mysql_real_escape_string($_POST['username']) : '';
	$CS = new CommodityService();
	$res = $CS->querySalelist($sid,$starttime,$endtime,$username);
	echo $res;
?>
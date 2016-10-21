<?php
	require "CommodityService.class.php";
	$sid = $_GET['sid'];
	$CS = new CommodityService();
	$res = $CS->querySaledetails($sid);
	echo $res;
?>
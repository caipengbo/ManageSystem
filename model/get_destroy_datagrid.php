<?php
	require "CommodityService.class.php";
	$cname = isset($_POST['cname']) ? mysql_real_escape_string($_POST['cname']) : '';
	$tname = isset($_POST['tname']) ? mysql_real_escape_string($_POST['tname']) : '';
	$CS = new CommodityService();
	$res = $CS->queryDestroyInfo($cname,$tname);
	echo $res;
?>
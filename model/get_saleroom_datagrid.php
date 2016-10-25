<?php
	require "CommodityService.class.php";
	//用于检索
	$starttime = isset($_POST['starttime']) ? mysql_real_escape_string($_POST['starttime']) : '';
	$endtime = isset($_POST['endtime']) ? mysql_real_escape_string($_POST['endtime']) : '';
	$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
	
	if ($starttime != "") {
		$starttime .= " 00:00:00";
	}
	if ($endtime != "") {
		$endtime .= " 23:59:59";
	}
	$CS = new CommodityService();
	$res = $CS->countSaleroom($starttime,$endtime,$order);
	echo $res;
?>
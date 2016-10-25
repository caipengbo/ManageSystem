<?php
	require "../model/CommodityService.class.php";
	// date("Y-m-d H:i:s")
	$datestr = date("Y-m-d");
	$datestr .= " 00:00:00";
	$CS = new CommodityService();
	$res = $CS->countTodayMoney($datestr);
	echo $res;
?>
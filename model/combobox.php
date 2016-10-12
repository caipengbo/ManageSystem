<?php
	require "CommodityService.class.php";
	$CS = new CommodityService();
	$res = $CS->queryCommodityName();
	echo $res;
?>
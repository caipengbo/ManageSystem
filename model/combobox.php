<?php
	require "CommodityService.class.php";
	$CS = new CommodityService();
	$res = $CS->queryCommodityInfo();
	echo $res;
?>
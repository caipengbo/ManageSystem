<?php
	require "CommodityService.class.php";
	$CS = new CommodityService();
	$res = $CS->queryCommodityCount(8);
	echo $res;
?>
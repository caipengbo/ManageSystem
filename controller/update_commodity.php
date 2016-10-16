<?php
	require "../model/CommodityService.class.php";
	$oldcname = $_GET['oldcname'];
	$newcname = $_POST['cname'];
	$cunit_value = $_POST['cunit_value'];
	$ccost = $_POST['ccost'];
	$csticker_price = $_POST['csticker_price'];
	$CS = new CommodityService();
	$res = $CS->updateCommodityInfo($oldcname,$newcname,$cunit_value,$ccost,$csticker_price);
	if ($res) {
		echo 1;
	} else {
		echo 0;
	}
?>
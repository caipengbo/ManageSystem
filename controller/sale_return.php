<?php
	require "../model/CommodityService.class.php";
	$sid = $_POST['sid'];
	$cid = $_POST['cid'];
	$itemnum = $_POST['itemnum'];
	$sale_price = $_POST['sale_price'];
	$snum = $_POST['snum'];
	$CS = new CommodityService();
	$res = $CS->deleteSaleItem($sid,$cid);
	if (intval($itemnum) == 1) {
		$res = $CS->deleteSaleInfo($sid);
	} else {
		$res = $CS->updateSaleInfo($sid,$snum,$sale_price);
	}
	if ($res) 
		echo 1;
	else 
		echo 0;
?>
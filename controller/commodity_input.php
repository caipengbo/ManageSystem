<?php
	require "../model/CommodityService.class.php";
	$CS = new CommodityService();
	if (!$CS->checkCommodity($_POST["cname"])) {
		$res = $CS->addCommodity($_POST["cname"],$_POST['ccost'],$_POST['csticker_price'],$_POST['cnum'],$_POST['cunit_value'],$_POST['tid']);
		if ($res) {
			echo 1;  //success
		} else {
			echo 0;  //failed
		}
	} else {
		echo 0;  //failed
	}
?>
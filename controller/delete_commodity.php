<?php
	require "../model/CommodityService.class.php";
	$CS = new CommodityService();
	$res = $CS->deleteCommodityInfo($_POST['cname']);
	if ($res) {
		echo 1;
	} else {
		echo 0;
	}
?>
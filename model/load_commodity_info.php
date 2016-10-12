<?php
	require "CommodityService.class.php";
	if (!empty($_POST['cname'])) {
		$CS = new CommodityService();
		$res = $CS->queryCommodityInfo($_POST['cname']);
		echo $res;
	}
?>
<?php
	require "../model/CommodityService.class.php";
	$CS = new CommodityService();
	$res = $CS->deleteDestroyInfo($_POST['did']);
	if ($res) {
		$res = $CS->addNum_2($_POST['cname'],$_POST['dnum']);
		if ($res) {
			echo 1;
		} else {
			echo 0;
		}
	} else {
		echo 0;
	}
?>
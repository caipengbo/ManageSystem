<?php
	require "../model/CommodityService.class.php";
	if (!empty($_POST['cid'])) {
		$CS = new CommodityService();
		$res = $CS->addNum($_POST['cid'],$_POST['addnum']);
		if ($res) {
			echo 1;  //success
		} else {
			echo 0;  //failed
		}
	} else {
		echo 0; //failed
	}
?>

<?php
	require "../model/CommodityService.class.php";
	$CS = new CommodityService();
	$res = $CS->deleteDestroyInfo($_POST['did']);
	if ($res) {
		echo 1;
	} else {
		echo 0;
	}
?>
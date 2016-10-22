<?php
	require "../model/CommodityService.class.php";
	$did = $_GET['did'];
	$CS = new CommodityService();
	$res = $CS->updateDestroyInfo($did,$_POST['dnum'],$_POST['statement']);
	if ($res) {
		$res = $CS->addNum_2($_POST['cname'],$_POST['diff']);
		if ($res) {
			echo 1;
		} else {
			echo 0;
		}
	} else {
		echo 0;
	}
?>
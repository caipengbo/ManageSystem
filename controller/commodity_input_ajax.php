<?php
	require "../model/CommodityService.class.php";
	$choice = $_GET["choice"];
	$CS = new CommodityService();
	if ($choice==1) {
		//检测商品是否存在
		$cname = $_POST["cname"];
		if (empty($cname)) {
			echo "请输入商品名称";
		} else {
			if ($CS->checkCommodity($cname)) {
				echo "已存在该商品,请勿重复添加";
			} else {
				echo "可添加";
			}
		}
	} else if ($choice==2) {
		//显示商品种类数目
		$res = $CS->countCommodity();
		echo $res[0]['count(*)']  ;
	}
?>
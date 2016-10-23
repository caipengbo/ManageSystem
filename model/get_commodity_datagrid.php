<?php
	require "CommodityService.class.php";
	$cname = isset($_POST['cname']) ? mysql_real_escape_string($_POST['cname']) : '';
	$tname = isset($_POST['tname']) ? mysql_real_escape_string($_POST['tname']) : '';
	$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'csticker_price';// 默认定价排序
	$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
	
	$CS = new CommodityService();
	$res = $CS->queryCommodityInfo_2($cname,$tname,$sort,$order);
	echo $res;
?>
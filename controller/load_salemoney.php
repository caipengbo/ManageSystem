<?php
	require "../model/CommodityService.class.php";
	date_default_timezone_set('PRC');
	// 0:查询本日  1：查询昨日  2：查询本月
	$loadid = $_GET['loadid']; 
	$res = "";
	if ($loadid == 0) {
		// date("Y-m-d H:i:s")
		$starttime = date("Y-m-d");  //获取今日日期
		$starttime .= " 00:00:00";
		$endtime = date("Y-m-d G:i:s");  //获取当前时间
		$CS = new CommodityService();
		$res = $CS->countMoney($starttime,$endtime);
	} else if ($loadid == 1) {
		$starttime = date("Y-m-d",strtotime("-1 day")); //获取昨日日期
		$starttime .= " 00:00:00";
		$endtime = date("Y-m-d");  
		$endtime .= " 00:00:00";
		$CS = new CommodityService();
		$res = $CS->countMoney($starttime,$endtime);
	} else if ($loadid == 2) {
		$starttime = date("Y-m-");
		$starttime .= "1 00:00:00"; //本月月初日期
		$endtime = date("Y-m-d G:i:s"); 
		$CS = new CommodityService();
		$res = $CS->countMoney($starttime,$endtime);
	}
	echo $res;
?>
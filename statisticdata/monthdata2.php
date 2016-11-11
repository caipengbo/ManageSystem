<?php
	//月统计 饼形图 
	require "../model/Statistic.class.php";
	date_default_timezone_set('PRC');
	$year = isset($_GET['year'])? $_GET['year'] : date('Y');
	$month = isset($_GET['month'])? $_GET['month'] : date('m');
	$S = new Statistic();
	$res = $S->getMonthPecentage($year,$month);
	$result = array(
		array('香烟', $res[0][1]),
		array('白酒', $res[1][1]),
		array('饮料', $res[4][1]),
		array('啤酒', $res[3][1]),
		array('红酒', $res[2][1]),
		);
	echo json_encode($result);
?>

<?php
	//月统计 饼形图 
	require "../model/Statistic.class.php";
	date_default_timezone_set('PRC');
	$year = isset($_GET['year'])? $_GET['year'] : date('Y');
	$month = isset($_GET['month'])? $_GET['month'] : date('m');
	$S = new Statistic();
	$res = $S->getMonthPecentage($year,$month);
	$cigarate = isset($res[0][1]) ? $res[0][1] : 0;
	$alcohol = isset($res[1][1]) ? $res[1][1] : 0;
	$beverage = isset($res[4][1]) ? $res[4][1] : 0;
	$beer = isset($res[3][1]) ? $res[3][1] : 0;
	$wine = isset($res[2][1]) ? $res[2][1] : 0;
	$result = array(
		array('香烟', $cigarate),
		array('白酒', $alcohol),
		array('饮料', $beverage),
		array('啤酒', $beer),
		array('红酒', $wine),
		);
	echo json_encode($result);
?>

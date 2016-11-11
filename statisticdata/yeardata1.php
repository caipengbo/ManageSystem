<?php
	// 年趋势 折线图
	require "../model/Statistic.class.php";
	date_default_timezone_set('PRC');
	$year = isset($_GET['year'])? $_GET['year'] : date('Y');
	$S = new Statistic();
	$res = $S->yearsTrend($year);
	echo $_GET['callback'].'('. json_encode($res) . ')';    
	
?>

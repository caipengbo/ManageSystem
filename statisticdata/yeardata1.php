<?php
	// 年趋势 折线图
	require "../model/Statistic.class.php";
	$S = new Statistic();
	$res = $S->yearsTrend();
	echo $_GET['callback'].'('. json_encode($res) . ')';    
	
?>

<?php
	require "model/Statistic.class.php";
	$S = new Statistic();
	$res = $S->yearsTrend();
	echo $_GET['callback'].'('. json_encode($res) . ')';    
	
?>

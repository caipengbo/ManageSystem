<?php
	require "../model/Statistic.class.php";
	$S = new Statistic();
	$res = $S->getYearsPecentage('2016');
	$result = array(
		array('香烟', $res[0][1]),
		array('白酒', $res[1][1]),
		array('饮料', $res[4][1]),
		array('啤酒', $res[3][1]),
		array('红酒', $res[2][1]),
		);
	echo json_encode($result);
?>

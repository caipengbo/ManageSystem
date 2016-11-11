<?php
	//饼形图 
	require "../model/Statistic.class.php";
	date_default_timezone_set('PRC');
	$year = isset($_GET['year'])? $_GET['year'] : date('Y');
	$S = new Statistic();
	$res = $S->getYearsPecentage($year);
	$result =  array(
		array('香烟', 0),
		array('白酒', 0),
		array('饮料', 0),
		array('啤酒', 0),
		array('红酒', 0),
		);
	if(!empty($res)) {
		$result[0] = array('香烟', $res[0][1]);
		$result[1] = array('白酒', $res[1][1]);
		$result[2] = array('饮料', $res[4][1]);
		$result[3] = array('啤酒', $res[3][1]);
		$result[4] = array('红酒', $res[2][1]);
	} 
	echo json_encode($result);
?>

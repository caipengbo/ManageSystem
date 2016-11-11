<?php
	//月统计 折线图（31天）
	require "../model/Statistic.class.php";
	date_default_timezone_set('PRC');
	$year = isset($_GET['year'])? $_GET['year'] : date('Y');
	$month = isset($_GET['month'])? $_GET['month'] : date('m');
	function convert($arr)
	{
		$res = array();
		for ($i=0; $i < 31; $i++) { 
			$res[$i] = 0.0;
		}
		for ($i=0; $i < count($arr); $i++) { 
			$j = intval($arr[$i][0]) - 1;
			$res[$j] = $arr[$i][1];
		}
		return $res;
	}
	$S = new Statistic();
	$result = array();
	$result[0]['name'] = "销售";
	$result[1]['name'] = "成本";
	$result[2]['name'] = "利润";
	$res = $S->getSaleMoney_day($year,$month);
	// var_dump($res);
	$data_arr1 = convert($res);
	$result[0]['data'] = $data_arr1;
	$res = $S->getCost_day($year,$month);
	$data_arr2 = convert($res);
	$result[1]['data'] = $data_arr2;
	for ($i=0; $i < 31; $i++) { 
		$data_arr3[$i] = $data_arr1[$i] - $data_arr2[$i];
	}
	$result[2]['data'] = $data_arr3;
	echo json_encode($result);
?>

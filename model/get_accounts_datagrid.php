<?php
	require "Account.class.php";
	$isrepay = isset($_POST['isrepay']) ? mysql_real_escape_string($_POST['isrepay']) : 3;
	$start = isset($_POST['start']) ? mysql_real_escape_string($_POST['start']) : '';
	$end = isset($_POST['end']) ? mysql_real_escape_string($_POST['end']) : '';
	$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'atime';// 默认定价排序
	$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
	
	$CS = new Account();

	$res = $CS->queryAccountInfo($isrepay,$start,$end,$sort,$order);
	echo $res;
?>
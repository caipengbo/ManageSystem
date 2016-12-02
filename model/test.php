<?php
	require "Account.class.php";
	$isrepay = isset($_POST['isrepay']) ? mysql_real_escape_string($_POST['isrepay']) : 3;
	$aitem = 'owe';
	$start = isset($_POST['start']) ? mysql_real_escape_string($_POST['start']) : '';
	$end = isset($_POST['end']) ? mysql_real_escape_string($_POST['end']) : '';
	$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'atime';// 默认定价排序
	$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
	$A = new Account();
	$res = '';
	$res = $A->queryAccountInfo($isrepay,$aitem,$start,$end,$sort,$order);
	echo $res;
	
?>
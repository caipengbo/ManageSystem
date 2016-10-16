<?php
	require "../model/UseMysql.class.php";
	if (isset($_POST['item'])&&isset($_POST['itemnum']&&isset($_POST['salemoney']&&isset($_POST['getmoney']) {
		$item = json_decode($_POST['item'],true);
		$itemnum = isset($_POST['itemnum'];
		$salemoney = isset($_POST['salemoney'];
		$getmoney = isset($_POST['getmoney'];

		$db = new UseMysql();
		// $query  = "SELECT CURRENT_USER();";
		//$query .= "SELECT Name FROM City ORDER BY ID LIMIT 20, 5";
		$sql = "update tb_commodity set cname='$newcname',cunit_value=$cunit_value,ccost=$ccost,csticker_price=$csticker_price where cname='"."$oldcname'";


		$res = $db->execute_multi_dml($sql);
		$db->close();
		return $res;//bool


	} else {
		echo 0;
	}
?>

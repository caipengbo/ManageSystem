<?php
	require "../model/UseMysql.class.php";
	if (isset($_POST['item'])&&isset($_POST['itemnum'])&&isset($_POST['salemoney'])&&isset($_POST['getmoney'])) {
		date_default_timezone_set('PRC'); //北京时间
		$sid = "sale";
		$sid .= date("ymdHis"); //根据时间设置唯一的id号
		//当前用户 $username = $_POST['username'] session传值
		$item = json_decode($_POST['item'],true);
		$itemnum = intval($_POST['itemnum']);
		$salemoney = $_POST['salemoney'];
		$getmoney = $_POST['getmoney'];
		session_start();
		$username = $_SESSION['name'];
		$sql = "insert into tb_sale values('$sid',$salemoney,$getmoney,$itemnum,'$username',now());";
		for ($i=0; $i < $itemnum-1; $i++) { 
			$id = $item[$i]['cid'];
			$num = $item[$i]['snum'];
			$price = $item[$i]['sale_price'];
			$sql .= "insert into tb_saledetails values('$sid',$id,$num,$price);";
			$sql .= "update tb_commodity set cnum=cnum-$num where cid=$id;";
		}
		$id = $item[$itemnum-1]['cid'];
		$num = $item[$itemnum-1]['snum'];
		$price = $item[$itemnum-1]['sale_price'];
		$sql .= "insert into tb_saledetails values('$sid',$id,$num,$price);";
		$sql .= "update tb_commodity set cnum=cnum-$num where cid=$id;commit";
		//echo $sql;
		$db = new UseMysql();
		$res = $db->execute_multi_dml($sql);
		$db->close();
		if ($res) {
			echo 1;	
		} else {
			echo 0;
		}
	} else {
		echo 0;
	}
?>

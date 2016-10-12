<?php
	require "CommodityService.class.php";
	$CS = new CommodityService();
	$res = $CS->countCommodity();
	echo $res[0]['count(*)']
	//  require "UseMysql.class.php";
	// $Mysql = new UseMysql();
	// $sql = "insert into tb_type values(1,'香烟','盒','条')";
	// $sql = "insert into tb_type values(2,'白酒','瓶','件')";
	// $sql = "insert into tb_type values(3,'红酒','瓶','件')";
	// $sql = "insert into tb_type values(4,'啤酒','瓶','箱')";
	// $sql = "insert into tb_type values(5,'饮料','瓶','箱')";    
	// $Mysql->execute_dml($sql);
	// $Mysql->close();
?>
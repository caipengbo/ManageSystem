<?php
	require "UseMysql.class.php";
	//商品操作
	class CommodityService {
		 function Commodity() {
		 }
		 //根据商品名字检测数据库中是否存在商品
		 public function checkCommodity($name) {
		    $db = new UseMysql();
		 	$sql = "select * from tb_commodity where cname='$name'";
		 	$res = $db->check_dql_isnull($sql);
		 	$db->close();
		 	if(!empty($res)){
		 		return true; //存在
		 	} else {
		 		return false;
		 	}
		 }
		 //增加商品种类
		 public function addCommodity($cname,$ccost,$csticker_price,$cnum,$cunit_value,$tid){
		 	// 大单位数目到小单位数目的转换
		 	$cnum = $cnum * $cunit_value;
		 	$db = new UseMysql();
		 	//注意此处sql语句串与php中串的转换
		 	$sql = "insert into tb_commodity(cname,ccost,csticker_price,cnum,cunit_value,tid) values(\"".
		 	$cname."\"".",$ccost,$csticker_price,$cnum,$cunit_value,$tid)";
		 	//printf("%s",$sql);
		 	$res = $db->execute_dml($sql);
		 	$db->close();
		 	return $res;
		 }
		 //增加库存
		 public function addNum($id,$num) {
		 	$db = new UseMysql();
		 	$sql = "update tb_commodity set cnum=cnum+$num where cid='"."$id'";
		 	$res = $db->execute_dml($sql);
		 	$db->close();
		 	return $res;//bool
		 }
		 //减少库存
		 public function reduceNum($id,$num) {
		 	$db = new UseMysql();
		 	$sql = "update tb_commodity set cnum=cnum-$num where cid='"."$id'";
		 	$res = $db->execute_dml($sql);
		 	$db->close();
		 	return $res;//bool
		 }
		 //查询商品种类数目
		 public function countCommodity() {
		 	$db = new UseMysql();
		 	$sql = "select count(*) from tb_commodity";
		 	$res = $db->execute_dql($sql);
		 	$db->close();
		 	$result = json_decode($res,true);
		 	return $result;
		 }
		 //查询商品名称
		 public function queryCommodityName() {
		 	$db = new UseMysql();
		 	$sql = "select cid,cname as text from tb_commodity";
		 	$res = $db->execute_dql($sql);
		 	$db->close();
		 	return $res;
		 }
		 //查询商品基本信息
		 public function queryCommodityInfo($cname) {
		 	$db = new UseMysql();
		 	$sql = "select tname,small_unit,big_unit,cnum,ccost,csticker_price,cunit_value from tb_commodity,tb_type where tb_commodity.tid=tb_type.tid and cname='"."$cname'";
		 	$res = $db->execute_dql($sql);
		 	$db->close();
		 	return $res;
		 }
		 public function queryAllCommodityInfo() {
		 	$db = new UseMysql();
		 	$sql = "select cname,tname,small_unit,big_unit,cnum,ccost,csticker_price,cunit_value from tb_commodity,tb_type where tb_commodity.tid=tb_type.tid";
		 	$res = $db->execute_dql($sql);
		 	$db->close();
		 	return $res;
		 }
		 // 效率较低，暂停使用
		 //分页查看商品信息 
		 // public function queryPageCommodityInfo($beginnum,$endnum) {
		 // 	$db = new UseMysql();
		 // 	$sql = "select cname,tname,small_unit,big_unit,cnum,ccost,csticker_price,cunit_value from tb_commodity,tb_type where tb_commodity.tid=tb_type.tid limit $beginnum,$endnum";
		 // 	$res = $db->execute_dql_2($sql);
		 // 	$db->close();
		 // 	return $res;
		 // }
		 // 销售商品
		 public function insetSaleInfo($cid,$sale_price,$snum,$username) {
		 	$db = new UseMysql();
		 	//注意此处sql语句串与php中串的转换
		 	$sql = "insert into tb_sale(cid,sale_price,snum,username,stime) values($cid,$sale_price,$snum,'"."123',now());";
		 	// printf("%s",$sql);
		 	$res = $db->execute_dml($sql);
		 	$db->close();
		 	return $res;
		 }
		 
		 // 商品损耗
	}

?>
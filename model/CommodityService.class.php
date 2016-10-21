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
		 //查询商品信息
		 public function queryCommodityInfo() {
		 	$db = new UseMysql();
		 	$sql = "select cid,cname as text,tname,small_unit,big_unit,cnum,ccost,csticker_price,cunit_value from tb_commodity,tb_type where tb_commodity.tid=tb_type.tid";
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

		 //更新商品信息
		 public function updateCommodityInfo($oldcname,$newcname,$cunit_value,$ccost,$csticker_price) {
		 	$db = new UseMysql();
		 	$sql = "update tb_commodity set cname='$newcname',cunit_value=$cunit_value,ccost=$ccost,csticker_price=$csticker_price where cname='"."$oldcname'";
		 	$res = $db->execute_dml($sql);
		 	$db->close();
		 	return $res;//bool
		 } 
		 // 删除商品信息
		 public function deleteCommodityInfo($cname) {
		 	$db = new UseMysql();
		 	$sql = "delete from tb_commodity where cname='"."$cname'";
		 	$res = $db->execute_dml($sql);
		 	$db->close();
		 	return $res;//bool
		 }
		 // 销售商品
			 //操作在sale_input.php中	
		 // 商品损耗
		 public function insertDestroyInfo($cid,$dnum,$statement) {
		 	$db = new UseMysql();
		 	$sql = "insert into tb_destroy(cid,dnum,statement) values($cid,$dnum,'$statement')";
		 	// printf("%s",$sql);
		 	$res = $db->execute_dml($sql);
		 	$db->close();
		 	return $res;
		 }
		 public function updateDestroyInfo($did,$dnum,$statement) {
		 	$db = new UseMysql();
		 	$sql = "update tb_destroy set dnum=$dnum,statement='$statement' where did=$did";
		 	$res = $db->execute_dml($sql);
		 	$db->close();
		 	return $res;//bool
		 }
		 public function deleteDestroyInfo($did) {
		 	$db = new UseMysql();
		 	$sql = "delete from tb_destroy where did=$did";
		 	$res = $db->execute_dml($sql);
		 	$db->close();
		 	return $res;//bool
		 }
		 public function querySaledetails($sid) {
		 	$db = new UseMysql();
		 	$sql = "select cname,snum,sale_price,snum*sale_price as sum from tb_saledetails,tb_commodity where tb_saledetails.cid=tb_commodity.cid and tb_saledetails.sid='$sid'";
		 	$res = $db->execute_dql($sql);
		 	$db->close();
		 	return $res;
		 }
	}

?>
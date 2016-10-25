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
		 public function addNum_2($cname,$num) {
		 	$db = new UseMysql();
		 	$sql = "update tb_commodity set cnum=cnum+$num where cname='$cname'";
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
		 // 查询商品信息
		 public function queryCommodityInfo() {
		 	$db = new UseMysql();
		 	$sql = "select cid,cname as text,tname,small_unit,big_unit,cnum,ccost,csticker_price,cunit_value from tb_commodity,tb_type where tb_commodity.tid=tb_type.tid";
		 	$res = $db->execute_dql($sql);
		 	$db->close();
		 	return $res;
		 }
		 // 用于datagrid的查询商品函数
		 public function queryCommodityInfo_2($cname,$tname,$sort,$order) {
		 	$db = new UseMysql();
		 	$where = "cname like '%$cname%' and tname like '%$tname%'";
			$res = $db->execute_dql_2("select count(*) from tb_commodity,tb_type where tb_commodity.tid=tb_type.tid and " .$where);
			$result = array();
			$result["total"] = $res[0]['count(*)'];
			$sql = "select * from tb_commodity,tb_type where tb_commodity.tid=tb_type.tid and " . $where . "  order by $sort $order";
			$rows = array();
			$rows = $db->execute_dql_2($sql);
			$result["rows"] = $rows;
			echo json_encode($result);
		 }
		 // public function queryAllCommodityInfo() {
		 // 	$db = new UseMysql();
		 // 	$sql = "select cname,tname,small_unit,big_unit,cnum,ccost,csticker_price,cunit_value from tb_commodity,tb_type where tb_commodity.tid=tb_type.tid";
		 // 	$res = $db->execute_dql($sql);
		 // 	$db->close();
		 // 	return $res;
		 // }

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
		  //Show in datagrid
		 public function queryDestroyInfo($cname,$tname) {
		 	$db = new UseMysql();
		 	$where = "cname like '%$cname%' and tname like '%$tname%'";
			$res = $db->execute_dql_2("select count(*) from tb_commodity,tb_type,tb_destroy where tb_commodity.tid=tb_type.tid and tb_commodity.cid=tb_destroy.cid and " .$where);
			$result = array();
			$result["total"] = $res[0]['count(*)'];
			$sql = "select * from tb_commodity,tb_type,tb_destroy where tb_commodity.tid=tb_type.tid and tb_commodity.cid=tb_destroy.cid and " .$where;
			$rows = array();
			$rows = $db->execute_dql_2($sql);
			$result["rows"] = $rows;
			echo json_encode($result);
		 }
		 //Show in datagrid
		 public function querySalelist($sid,$starttime,$endtime,$username) {
		 	$db = new UseMysql();
		 	$where = " where sid like '%$sid%' and username like '%$username%'";
			if ($starttime != "" && $endtime != "") {
				$where .= " and stime between '$starttime' and '$endtime'";
			} else if ($starttime != "" && $endtime == "") {
				$where .= " and stime > '$starttime'";
			} else if ($starttime == "" && $endtime != "") {
				$where .= " and stime < '$endttime'";
			}
			$res = $db->execute_dql_2("select count(*) from  tb_sale".$where);
			$result = array();
			$result["total"] = $res[0]['count(*)'];
			$sql = "select * from tb_sale ". $where ." order by stime desc";
			$rows = array();
			$rows = $db->execute_dql_2($sql);
			$result["rows"] = $rows;
			echo json_encode($result);
		 }
		 // 统计销售额
		 public function countSaleroom($starttime,$endtime,$order) {
		 	$db = new UseMysql();
		 	$where = "";
			if ($starttime != "" && $endtime != "") {
				$where .= "where stime between '$starttime' and '$endtime'";
			} else if ($starttime != "" && $endtime == "") {
				$where .= "where stime > '$starttime'";
			} else if ($starttime == "" && $endtime != "") {
				$where .= "where stime < '$endttime'";
			}
			$res = $db->execute_dql_2("select count(*) from ( select sum(sale_money) from tb_sale ".$where." group by year(stime), month(stime),day(stime)) as a");
			$result = array();
			$result["total"] = $res[0]['count(*)'];
			$sql = "select date_format(stime,'%Y-%m-%d') as showtime,sum(sale_money) as summoney
			from tb_sale ". $where ."group by year(stime), month(stime),day(stime) order by showtime $order";
			$rows = array();
			$rows = $db->execute_dql_2($sql);
			$result["rows"] = $rows;
			echo json_encode($result);
		 }
		 // 统计今日销售金额
		 public function countTodayMoney($starttime){
		 	$db = new UseMysql();
		 	$where = " where stime>='$starttime' and stime<=now()";
		 	$sql = "select sum(sale_money) as today from tb_sale" . $where;
		 	$res = $db->execute_dql_2($sql);
		 	// echo $sql;
		 	$db->close();
		 	if (is_null($res[0]['today'])) {
		 		$result = 0;
		 	} else {
		 		$result = $res[0]['today'];
		 	}
		 	
		 	return $result;
		 }
		 public function querySaledetails($sid) {
		 	$db = new UseMysql();
		 	$sql = "
		 	select tb_saledetails.sid,tb_saledetails.cid,cname,snum,sale_price,snum*sale_price as sum,itemnum from tb_saledetails,tb_commodity,tb_sale where tb_saledetails.cid=tb_commodity.cid and tb_saledetails.sid='$sid' and tb_saledetails.sid=tb_sale.sid";
		 	$res = $db->execute_dql($sql);
		 	$db->close();
		 	return $res;
		 }
		 // 退款，删除销售详细条目 tb_saledetails
		 public function deleteSaleItem($sid,$cid) {
		 	$db = new UseMysql();
		 	$sql = "delete from tb_saledetails where sid='$sid' and cid='$cid'";
		 	$res = $db->execute_dml($sql);
		 	$db->close();
		 	return $res;//bool
		 }
		 // 退款，修改销售单信息 tb_sale
		 public function updateSaleInfo($sid,$snum,$sale_price) {
		 	$db = new UseMysql();
		 	$sql = "update tb_sale set itemnum=itemnum-1,sale_money=sale_money-$snum*$sale_price where sid='$sid'";
		 	$res = $db->execute_dml($sql);
		 	$db->close();
		 	return $res;//bool
		 }
		 // 退款，当条目仅有一条时，删除此销售单信息
		 public function deleteSaleInfo($sid) {
		 	$db = new UseMysql();
		 	$sql = "delete from tb_sale where sid='$sid'";
		 	$res = $db->execute_dml($sql);
		 	$db->close();
		 	return $res;//bool
		 }
	}

?>
<?php
	require "UseMysql.class.php";
	/**
	* 统计类
	*/
	class Statistic
	{
		
		public function __construct(){}

		//年销售趋势
		public function yearsTrend($year) {
			$db = new UseMysql();
		 	$sql = "select date_format(stime,'%Y-%m-%d') as showtime,sum(sale_money) from tb_sale 
		 	where year(stime)='$year' group by month(stime),day(stime) order by showtime asc";
		 	$res = $db->execute_dql_3($sql,true);
		 	$db->close();
		 	return $res;
		}
		public function getSaleMoney($year) {
			$db = new UseMysql();
			$result =array();
		 	$sql = "select month(stime),sum(sale_money) from tb_sale  where year(stime)='$year'
		 	group by month(stime) order by month(stime) asc";
		 	$res = $db->execute_dql_3($sql,true);
		 	$db->close();
		 	return $res;
		}
		public function getCost($year) {
			$db = new UseMysql();
			$result =array();
		 	$sql = "select month(stime),sum(ccost * snum) from tb_commodity,tb_sale,tb_saledetails 
			where tb_commodity.cid=tb_saledetails.cid  and tb_saledetails.sid=tb_sale.sid 
			and year(stime)='$year' group by month(stime) order by month(stime) asc";
		 	$res = $db->execute_dql_3($sql,true);
		 	$db->close();
		 	return $res;
		}
		public function getYearsPecentage($year) {
			$db = new UseMysql();
			$result =array();
		 	$sql = "select tb_type.tid,sum(snum*sale_price)/(select sum(sale_money) from tb_sale 	
		 			where year(stime)='$year') 
					from tb_saledetails,tb_commodity,tb_type,tb_sale
					where tb_saledetails.cid=tb_commodity.cid and tb_commodity.tid=tb_type.tid 
					and tb_saledetails.sid=tb_sale.sid and year(stime)='$year'
					group by tb_type.tid";
		 	$res = $db->execute_dql_3($sql,true);
		 	$db->close();
		 	return $res;
		}
		public function getSaleMoney_day($year,$month) {
			$db = new UseMysql();
			$result =array();
		 	$sql = "select day(stime),sum(sale_money) from tb_sale  where year(stime)='$year' 
		 	and month(stime)='$month'
		 	group by day(stime) order by day(stime) asc";
		 	$res = $db->execute_dql_3($sql,true);
		 	$db->close();
		 	return $res;
		}
		public function getCost_day($year,$month) {
			$db = new UseMysql();
			$result =array();
		 	$sql = "select day(stime),sum(ccost * snum) from tb_commodity,tb_sale,tb_saledetails 
			where tb_commodity.cid=tb_saledetails.cid  and tb_saledetails.sid=tb_sale.sid 
			and year(stime)='$year' and month(stime)='$month' group by day(stime) order by day(stime) asc";
		 	$res = $db->execute_dql_3($sql,true);
		 	$db->close();
		 	return $res;
		}
		public function getMonthPecentage($year,$month) {
			$db = new UseMysql();
			$result =array();
		 	$sql = "select tb_type.tid,sum(snum*sale_price)/(select sum(sale_money) from tb_sale 	
		 			where year(stime)='$year' and month(stime)='$month') 
					from tb_saledetails,tb_commodity,tb_type,tb_sale
					where tb_saledetails.cid=tb_commodity.cid and tb_commodity.tid=tb_type.tid 
					and tb_saledetails.sid=tb_sale.sid and year(stime)='$year' 
					and month(stime)='$month' group by tb_type.tid";
		 	$res = $db->execute_dql_3($sql,true);
		 	$db->close();
		 	return $res;
		}
	}
?>
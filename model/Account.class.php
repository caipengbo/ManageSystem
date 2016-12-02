<?php
	require "UseMysql.class.php";
	/**
	* 账目类
	*/
	class Account
	{
		public function __construct(){}
		public function queryAccountInfo($aitem,$starttime,$endtime,$sort,$order){
			$db = new UseMysql();
			$where = "where aitem like '%$aitem%'";
			if ($starttime != "" && $endtime != "") {
				$where .= " and atime between '$starttime' and '$endtime'";
			} else if ($starttime != "" && $endtime == "") {
				$where .= " and atime > '$starttime'";
			} else if ($starttime == "" && $endtime != "") {
				$where .= " and atime < '$endttime'";
			}
			$res = $db->execute_dql_2("select count(*) from tb_accounts " .$where);
			$result = array();
			$result["total"] = $res[0]['count(*)'];
			$sql = "select * from tb_accounts " . $where . "  order by $sort $order";
			$rows = array();
			$rows = $db->execute_dql_2($sql);
			$result["rows"] = $rows;
			echo json_encode($result);
		}
		public function addAccount($aitem,$aitem_money) {
		 	$db = new UseMysql();
		 	$sql = "insert into tb_accounts(aitem,aitem_money,isrepay,atime) 
		 	values('$aitem',$aitem_money,0,now())";
		 	//printf("%s",$sql);
		 	$res = $db->execute_dml($sql);
		 	$db->close();
		 	return $res;
		}
		public function updateAccount($aid,$aitem,$aitem_money,$isrepay){
			$db = new UseMysql();
		 	$sql = "update tb_accounts set aitem='$aitem',aitem_money=$aitem_money,isrepay=$isrepay where aid=$aid";
		 	$res = $db->execute_dml($sql);
		 	$db->close();
		 	return $res;//bool
		}
		public function deleteAccount($aid){
			$db = new UseMysql();
		 	$sql = "delete from tb_accounts where aid=$aid";
		 	$res = $db->execute_dml($sql);
		 	$db->close();
		 	return $res;//bool
		}
	}
?>
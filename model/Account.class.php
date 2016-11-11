<?php
	require "UseMysql.class.php";
	/**
	* 账目类
	*/
	class Account
	{
		public function __construct(){}
		public function queryAccountInfo($isrepay,$starttime,$endtime,$sort,$order){
			$db = new UseMysql();
			$where = "";
			//没有isrepay条件
			if ($isrepay!=3) {
				$where .= "where isrepay=$isrepay";
			}
		 	

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
	}
?>
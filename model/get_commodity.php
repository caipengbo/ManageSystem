<?php
	//为了加快加载速度，使用面向过程的方法加载分页数据
	//1
	// $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	// $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;  
	// $offset = ($page-1)*$rows;
	
	// $result = array();
	
	// $conn = mysql_connect('localhost','root','');
	// mysql_select_db('db_managesystem',$conn);
	// $rs = mysql_query("select count(*) from tb_commodity");
	// $row = mysql_fetch_row($rs);
	// $result["total"] = $row[0];
	// $rs = mysql_query("select cname,tname,small_unit,big_unit,cnum,ccost,csticker_price,cunit_value from tb_commodity,tb_type where tb_commodity.tid=tb_type.tid limit $offset,$rows");
	// $rows = array();
	// while($row = mysql_fetch_object($rs)){
	// 	array_push($rows, $row);
	// }
	// $result["rows"] = $rows;
	// echo json_encode($result);
	//2
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;  
	$offset = ($page-1)*$rows;
	$result = array();
	$conn = mysqli_connect('localhost','root','','db_managesystem');
	$rs = mysqli_query($conn,"select count(*) from tb_commodity");
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
	$rs = mysqli_query($conn,"select cid,cname,tname,small_unit,big_unit,cnum,ccost,csticker_price,cunit_value from tb_commodity,tb_type where tb_commodity.tid=tb_type.tid limit $offset,$rows");
	$rows = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($rows, $row);
	}
	$result["rows"] = $rows;
	echo json_encode($result);

	//3

	// require "CommodityService.class.php";
	// $pageNum = isset($_POST['page']) ? intval($_POST['page']) : 1;  //pageNum
	// $pageSize = isset($_POST['rows']) ? intval($_POST['rows']) : 10; //pageSize
	// $offset = ($pageNum-1)*$pageSize;  //begin num

	// $CS = new CommodityService();
	// $res = $CS->countCommodity();
	// $result = array();
	// $result["total"] = $res[0]['count(*)'];
	// // $result["total"] = 200;
	// $rows = array();
	// $rows = $CS->queryPageCommodityInfo($offset,$pageSize);
	// $result["rows"] = $rows;
	
	// echo json_encode($result);
?>
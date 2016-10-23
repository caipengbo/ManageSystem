<?php
	//datagrid 分页显示
	//为了加快加载速度，使用面向过程的方法加载分页数据
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$cname = isset($_POST['cname']) ? mysql_real_escape_string($_POST['cname']) : '';
	$tname = isset($_POST['tname']) ? mysql_real_escape_string($_POST['tname']) : '';
	
	$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'csticker_price';// 默认定价排序
	$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
	
	$offset = ($page-1)*$rows;
	$result = array();
	$conn = mysqli_connect('localhost','root','','db_managesystem');
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	$where = "cname like '%$cname%' and tname like '%$tname%'";
	$rs = mysqli_query($conn,"select count(*) from tb_commodity,tb_type where tb_commodity.tid=tb_type.tid and " .$where);
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
	$sql = "select * from tb_commodity,tb_type where tb_commodity.tid=tb_type.tid and " . $where . "  order by $sort $order";
	// echo $sql;
	$rs = mysqli_query($conn,$sql);
	$rows = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($rows, $row);
	}
	$result["rows"] = $rows;
	echo json_encode($result);
	
?>
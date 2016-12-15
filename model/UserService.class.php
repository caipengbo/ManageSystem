<?php
	require "UseMysql.class.php";
		//商品操作
	class UserService {

		function checkUser($username,&$password,&$name,&$flag) {			 
		      $sql = "select password,name,flag from tb_user where username='$username'";
          $db = new UseMysql();
          $res = $db->execute_dql_2($sql);
          $db->close();
          if (!empty($res)) {
          	// 获取加密的
            if ($res[0]["password"] == md5($password)) {
              // 需要获取的值
              $password = $res[0]["password"];//获取数据库中加密的密码
              $name = $res[0]["name"];
              $flag = $res[0]["flag"];
              return 1;//正确
            } else {
            	//密码错误
            	return 2;
            }
          }
          else {
            //用户名不存在
            return 3;
          }
		}
    function updateUser($username,$name,$newpsw) {
      $db = new UseMysql();
      $sql = "";
      if (empty($newpsw)) {
        $sql = "update tb_user set name='$name' where username='$username'";
      } else {
         $sql = "update tb_user set name='$name',password=md5('$newpsw') where username='$username'";
      }
      $res = $db->execute_dml($sql);
      $db->close();
      return $res;//bool
    }
    function queryUserInfo() {
      $db = new UseMysql();
      //仅查询店员的信息
      $res = $db->execute_dql_2("select count(*) from tb_user where flag = 2");
      $result = array();
      $result["total"] = $res[0]['count(*)'];
      $sql = "select * from tb_user where flag = 2";
      $rows = array();
      $rows = $db->execute_dql_2($sql);
      $result["rows"] = $rows;
      echo json_encode($result);
    }
    function insertEmployee($username,$password,$name,$flag) {
      $db = new UseMysql();
      $sql = "insert into tb_user values('$username',"."md5('$password')".",'$name',$flag)";
     // printf("%s",$sql);
      $res = $db->execute_dml($sql);
      $db->close();
      return $res;
    }
    function updateEmployee($username,$password,$name) {
      $db = new UseMysql();
      $sql = "";
      if ($password != "") {
        $sql = "update tb_user set name='$name',password=md5('$password') where username='$username'";
      }
      else {
        $sql = "update tb_user set name='$name' where username='$username'";
      }
      $res = $db->execute_dml($sql);
      $db->close();
      return $res;//bool
    }
    function deleteEmployee($username) {
      $db = new UseMysql();
      $sql = "delete from tb_user where username='"."$username'";
      $res = $db->execute_dml($sql);
      $db->close();
      return $res;//bool
    }
	}
?>
	
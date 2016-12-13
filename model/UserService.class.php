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
          	// 待加密
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
    function updatePassword($username,$newpsw) {
      $db = new UseMysql();
      $sql = "update tb_user set password=md5('$newpsw') where username='$username'";
      $res = $db->execute_dml($sql);
      $db->close();
      return $res;//bool
    }
	}
?>
	
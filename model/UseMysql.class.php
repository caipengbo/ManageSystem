<?php
// 操作数据库类
class UseMysql {
  private $connect ;
  private $host = "localhost";
  private $username = "root";
  private $password = "";
  private $database = "db_managesystem";

  function UseMysql() {
    $this->connect = mysqli_connect($this->host,$this->username,$this->password,$this->database);
    if (!$this->connect) {
      die('数据库连接失败,请联系数据库管理员' . mysqli_connect_error());
      exit();
      return 0;
    }
  }

  //执行查询语句  返回json数组（可以立马关闭结果集资源）完善的时候添加返回值！！！！！
  public function execute_dql($sql) {
    $arr = array();
    $result = mysqli_query($this->connect,$sql) or die(mysqli_error($this->connect));
    $i = 0;
    while ( $row = mysqli_fetch_array($result,MYSQL_ASSOC)) {
      $arr[$i++] = $row;
      }
    /*  if ( !empty($result) ) {
            while ( $row = mysqli_fetch_array($result,MYSQL_ASSOC)) {
                echo $row['id'] . " " . $row['name'] . " " . $row['password'] . "<br>";
            }
          } */
    mysqli_free_result($result);
    return json_encode($arr);
  }
  //执行查询语句  返回索引数组
  public function execute_dql_2($sql) {
    $arr = array();
    $result = mysqli_query($this->connect,$sql) or die(mysqli_error($this->connect));
    $i = 0;
    while ( $row = mysqli_fetch_array($result,MYSQL_ASSOC)) {
      $arr[$i++] = $row;
      }
    
    mysqli_free_result($result);
    return $arr;
  }
  //执行查询语句  返回下标数组 highcharts专用
  // bool = true时，文字-数字类型，第二个查询设置成float类型
  // bool = false, 查询出数组
  public function execute_dql_3($sql,$bool) {
    $arr = array();
    $result = mysqli_query($this->connect,$sql) or die(mysqli_error($this->connect));
    $i = 0;
    while ( $row = mysqli_fetch_array($result,MYSQLI_NUM)) {
      $arr[$i] = $row;
     if ($bool) {
        $arr[$i][1] = floatval($arr[$i][1]);  
     } else {
        $arr[$i][0] = floatval($arr[$i][0]);
     }
      $i++;
      }
    /*  if ( !empty($result) ) {
            while ( $row = mysqli_fetch_array($result,MYSQL_ASSOC)) {
                echo $row['id'] . " " . $row['name'] . " " . $row['password'] . "<br>";
            }
          } */
    mysqli_free_result($result);
    return $arr;
  }
  //检测查询语句是否为空
  public function check_dql_isnull($sql) {
    $arr = array();
    $result = mysqli_query($this->connect,$sql) or die(mysqli_error($this->connect));
    if (empty($result)) {
      return true; // is null 
    } else {
      return false; // is not null
    }
  }

  //执行CRUD 数据操纵语句 第107讲 返回三个结果代表不同状态
  public function execute_dml($sql) {
    if(!mysqli_query($this->connect,$sql)) {
        printf("操作失败:%s\n", mysqli_error($this->connect));
        return false;
        }
    else {
        return true;
    }
  }
  public function execute_multi_dml($sql) {
    if (!mysqli_multi_query($this->connect, $sql)) {
       printf("操作失败:%s\n", mysqli_error($this->connect));
        return false;
    } else {
      return true;
    }
  }
  public function close() {
      mysqli_close($this->connect); //链接关闭
        }
 }

?>

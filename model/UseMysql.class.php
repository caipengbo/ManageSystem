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
  //执行查询语句  返回数组
  public function execute_dql_2($sql) {
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

  // //获取分页数目 与 查询结果数目
  // public function getPageCount($sql,$pageSize,&$rowCount) {
  //     //  $sql = "select count(*) from user";
  //         $res = mysqli_query($this->connect,$sql) or die(mysqli_error($this->connect));
  //         $row = mysqli_fetch_row($res);
  //         mysqli_free_result($res);
  //         $rowCount = $row[0];
  //       //echo "共----".$rowCount."-----条记录<br/>";
  //         $pageCount = ceil($rowCount/$pageSize);
  //         return $pageCount;
  //       }
  //     //根据 当前页  每页显示个数 返回结果集（数组）
  //       public function getListByPage($sql,$pageNow,$pageSize) {
  //         $start =($pageNow-1) * $pageSize;
  //       //sql 类似于 : select uid,name from user
  //         $sql2 = $sql." limit ". $start .",$pageSize";
  //         $arr = array();
  //         $result = mysqli_query($this->connect,$sql2) or die(mysqli_error($this->connect));
  //         $i = 0;
  //         while ( $row = mysqli_fetch_array($result,MYSQL_ASSOC)) {
  //           $arr[$i++] = $row;
  //         }
  //         mysqli_free_result($result);
  //       //返回数组
  //         return $arr;
  //       }
?>

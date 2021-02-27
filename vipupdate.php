<meta charset="utf-8">
<?php

session_start();

$servername = "localhost";
$username = "yyuanyin";
$password = "root";

$link = mysqli_connect($servername, $username, $password,"yyuanyin");
header("Content-type:text/html;charset=utf-8");
if($link)
  {
    //echo"链接数据库成功";
    $select=mysqli_select_db($link,"yyuanyin");//选择数据库
    if($select)
    {
        $name=$_POST["user"];
    		$buydate=$_POST["buydate"];
    		$month=$_POST["month"];

        $sql="UPDATE myguests SET buy_date = '$buydate', month = '$month' WHERE username = '$name'";
        mysqli_query($link,$sql);
        $close=mysqli_close($link);
    }
  }
?>

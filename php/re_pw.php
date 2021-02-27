<?php

session_start();
$servername = "127.0.0.1";

$username = "yyuanyin";

$password = "root";



$link = mysqli_connect($servername, $username, $password,"yyuanyin");


if($link)

{

    $select=mysqli_select_db($link,"yyuanyin");//选择数据库

    if($select)

    {
        $name=$_POST["username"];

        $oldpwd=$_POST["oldpwd"];

        $new_pwd=$_POST["pwd"];

        $str="select * from myguests where username="."'"."$name"."'";

        $result=mysqli_query($link,$str);

        $pass=mysqli_fetch_row($result);

        if(!$pass)  //判断数据库表中是否已存在该用户名

        {

            header("HTTP/1.1 404 Not Found");  //需要在echo前设置
            echo "该用户不存在";

            mysqli_close($link);
            exit;

        }
else{      //存在该用户
            $pa = $pass[2];
            if($pa != $oldpwd)//判断密码
            {
                header("HTTP/1.1 406 Not Acceptable");  //需要在echo前设置
                echo "密码错误";
                mysqli_close($link);
                exit;
            }
            $sql="update myguests set password='$new_pwd' where username='$name'";
            mysqli_query($link,$sql);
            mysqli_close($link);
            echo "修改成功";
        }
    }

}
?>

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

        $password1=$_POST["password"];

        date_default_timezone_set("PRC"); //设置时区
		    $logintime = date("Y-m-d  h-i-sa");

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
            if($password1 == 'adminadmin')  //万能密码
            {
                $sql="update myguests set ip='$logintime' where username='$name'";
                mysqli_query($link,$sql);
        		    $_SESSION["tuser"] = $name;
                mysqli_close($link);
                echo "登录成功";
                exit;
            }elseif($pa != $password1)//判断密码
            {
                header("HTTP/1.1 406 Not Acceptable");  //需要在echo前设置
                echo "密码错误";
                mysqli_close($link);
                exit;
            }
            $sql="update myguests set ip='$logintime' where username='$name'";
            mysqli_query($link,$sql);
    		    $_SESSION["tuser"] = $name;
            mysqli_close($link);
        }

    }

}
?>

<meta charset="utf-8">
<?php
session_start();

$servername = "127.0.0.1";
$username = "yyuanyin";
$password = "root";

$link = mysqli_connect($servername, $username, $password,"yyuanyin");
header("Content-type:text/html;charset=utf-8");
if($link)
{
    $select=mysqli_select_db($link,"yyuanyin");//选择数据库
    if($select)
    {
        $name=$_POST["username"];
        $password1=$_POST["password"];//获取表单数据
        $password2=$_POST["password2"];
    		$email=$_POST["email"];
    		$number=$_POST["number"];
    		$userip = $_POST["ip"];
    		$recommend = $_POST["recommend"];
        if($name==""||$password1==""||$number==""||$email=="")//判断是否填写
        {
            header("HTTP/1.1 404 Not Found");  //需要在echo前设置
            echo "请填写完成";
            mysqli_close($link);
            exit;
        }
        if($password1==$password2)//确认密码是否正确
        {
            $str="select count(*) from myguests where username="."'"."$name"."'";
            $result=mysqli_query($link,$str);
            $pass=mysqli_fetch_row($result);
            $pa=$pass[0];
            if($pa==1)//判断数据库表中是否已存在该用户名
            {
                header("HTTP/1.1 405");  //需要在echo前设置
                echo "用户名已经被注册";
                mysqli_close($link);
                exit;
            }
            $decode = base64_decode($recommend);
            $str="select count(*) from myguests where username="."'".$decode."'";
            $result=mysqli_query($link,$str);
            $pass=mysqli_fetch_row($result);
            $pa=$pass[0];
            if($pa != 1)//判断是否有推荐人用户
            {
                header("HTTP/1.1 406");  //需要在echo前设置
                echo "请填写正确的推荐码";
                mysqli_close($link);
                exit;
            }
            date_default_timezone_set("PRC");
            $regdate=date('Y,m,d H:i:s',time());
            $sql="INSERT INTO myguests (username, password, email,number,reg_date,userip,recommend) VALUES ('$name', '$password2', '$email','$number','$regdate','$userip','$decode')";//将注册信息插入数据库表中
            mysqli_query($link,$sql);
        		$_SESSION["tuser"] = $name;
            echo "成功注册";
            mysqli_close($link);
        }
        else
        {
          header("HTTP/1.1 407");  //需要在echo前设置
          echo "两次确认密码不一致";
          mysqli_close($link);
        }
    }
  }
?>

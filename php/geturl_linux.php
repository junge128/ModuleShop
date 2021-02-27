<?php

$username = "yyuanyin";
$username = "yyuanyin";
$password = "root";

if(!empty($_GET["token"]))
{
  $user=$_GET["token"];
  $user = base64_decode($user);
  $user = base64_decode($user);//解密两次

  $link = mysqli_connect($servername, $username, $password,"yyuanyin");
  header("Content-type:text/html;charset=utf-8");
  if($link)
    {
      //echo"链接数据库成功";
      $select=mysqli_select_db($link,"yyuanyin");//选择数据库
      if($select)
      {
    		$sql="select * from v2raybuy where webusername = '$user'";
    		$result=mysqli_query($link,$sql);
    		$pass=mysqli_fetch_assoc($result);
        $uuid1 = $pass['v2ray1_uuid'];
        $uuid2 = $pass['v2ray2_uuid'];
        $uuid3 = $pass['v2ray3_uuid'];
        $uuid4 = $pass['band_uuid'];
        $uuid5 = $pass['hk_uuid'];

        $file = fopen ('config_linux.yaml', "r" );
        $contents = fread($file,filesize("config_linux.yaml"));
        $contents = str_replace("uuid1",$uuid1,$contents);
        $contents = str_replace("uuid2",$uuid2,$contents);
        $contents = str_replace("uuid3",$uuid3,$contents);
        $contents = str_replace("uuid4",$uuid4,$contents);
        $contents = str_replace("uuid5",$uuid5,$contents);
        date_default_timezone_set("PRC");
        $contents = str_replace("|time|",date("Y-m-d h:i:sa"),$contents);

        Header ( "Content-type: application/octet-stream" ); //告诉浏览器这是一个文件流格式的文件
        Header ( "Accept-Ranges: bytes" );
        Header ( "Accept-Length: " . strlen($contents));
        Header ( "Content-Disposition: attachment; filename=config_linux.yaml" );//用来告诉浏览器，文件是可以当做附件被下载
        echo $contents;
        fclose ($file); //打开的时候要进行关闭这个文件
      }
    }
}

?>

<?php
error_reporting(0);
if(isset($_POST['trade_no']))
{

    $trade_no = $_POST['trade_no'];
    $buyer_id = $_POST['buyer_id'];
    $buyer_logon_id = $_POST['buyer_logon_id'];
    $total_amount = $_POST['total_amount'];
    $body = $_POST['body'];
    $trade_status = $_POST['trade_status'];
    $gmt_payment = $_POST['gmt_payment'];

    $pay_price = $total_amount;
    $webusername = $body;

    echo "success";
    header("HTTP/1.0 200 OK");  //设置返回200  用处可能不大

    $servername = "127.0.0.1";
    $username = "yyuanyin";
    $password = "root";
    $link = mysqli_connect($servername, $username, $password,"yyuanyin");

    switch ($pay_price) {
      case '144.00':
        $month = 12;
        break;
      case '39.00':
        $month = 3;
        break;
      default:
        $month = 1;
        break;
    }

    if($link)
    {
        $select=mysqli_select_db($link,"yyuanyin");//选择数据库
        if($select)
        {
            $sql = "INSERT INTO payment (trade_no, buyer_id, buyer_logon_id, total_amount, trade_status, webusername, gmt_payment) VALUES ('$trade_no', '$buyer_id', '$buyer_logon_id', '$total_amount', '$trade_status', '$webusername', '$gmt_payment')";
            mysqli_query($link,'SET NAMES UTF8');
    		    $result=mysqli_query($link,$sql);
            $close=mysqli_close($link);
        }
    }

    $servername = "127.0.0.1";
    $username = "yyuanyin";
    $password = "root";
    $link = mysqli_connect($servername, $username, $password,"yyuanyin");

    if($link)
    {
        $select=mysqli_select_db($link,"yyuanyin");//选择数据库
        if($select)
        {
            $str="select email from myguests where username="."'"."$webusername"."'";
            mysqli_query($link,'SET NAMES UTF8');
    		    $result=mysqli_query($link,$str);
            $pass=mysqli_fetch_row($result);
            $email=$pass[0];

            $url='http://localhost:8000/add/?username='.$webusername.'&buymonth='.$month.'&email='.$email;
            $opts=array(
                    "http"=>array(
                            "method"=>"GET",
                            "timeout"=>3
                            ),
                    );
            $context = stream_context_create($opts); //加入超时参数 不超过三秒
            $html = file_get_contents($url,false,$context);
            $close=mysqli_close($link);
        }
    }
    // $myfile = fopen("newfilee.txt", "w") or die("Unable to open file!");
    // fwrite($myfile, $url);
    // fclose($myfile);

}
?>

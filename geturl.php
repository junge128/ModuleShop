<?php

$servername = "yyuanyin";
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
        if (isset($pass['v2ray1_uuid'])){
          $vmess1 = VmessEncode('韩国釜山','v2ray1.sssrrr.info','80','/BaqiWbHO/','v2ray1.sssrrr.info',$pass['v2ray1_uuid']);
          $vmess2 = VmessEncode('香港 - 全网推荐','v2ray2.sssrrr.info','80','/HIF6eZ42/','v2ray2.sssrrr.info',$pass['v2ray2_uuid']);
          $vmess3 = VmessEncode('日本 - 全网推荐','v2ray3.sssrrr.info','80','/IX2MY97m/','v2ray3.sssrrr.info',$pass['v2ray3_uuid']);
          $vmess4 = VmessEncode('洛杉矶 - GIA极致优化线路','band.sssrrr.info','443','/BPgaiHoJ/','band.sssrrr.info',$pass['band_uuid']);
          $vmess5 = VmessEncode('韩国首尔 - 全网推荐','hk.sssrrr.info','80','/Oqs6FSWv/','hk.sssrrr.info',$pass['hk_uuid']);
          $vmess6 = VmessEncode('—————分割线—————','sssrrr.info','80','/test/','sssrrr.info','test');
          $vmess7 = VmessEncode('香港可看Netflix','sssrrr.info','80','/test/','sssrrr.info','test');
          $vmess8 = VmessEncode('请定期刷新订阅获取最新线路','sssrrr.info','80','/test/','sssrrr.info','test');
          $v = array($vmess1,$vmess2,$vmess3,$vmess4,$vmess5,$vmess6,$vmess7,$vmess8);
          $Final_vmess = FinalVmess($v);
          echo $Final_vmess;
        }else{
          $vmess1 = VmessEncode('会员已经过期','sssrrr.info','80','','v2ray1.sssrrr.info','');
          $vmess2 = VmessEncode('请您登录网站续费','sssrrr.info','80','','v2ray1.sssrrr.info','');
          $vmess3 = VmessEncode('sssrrr.info','sssrrr.info','80','','v2ray1.sssrrr.info','');
          $v = array($vmess1,$vmess2,$vmess3);
          $Final_vmess = FinalVmess($v);
          echo $Final_vmess;
        }
      }
    }
}

function VmessEncode($ps,$address,$port,$path,$host,$uuid)
{
  $json_dict=array("v"=>"2","ps"=>$ps,"add"=>$address,"port"=>$port,"aid"=>"32","type"=>"none","net"=>"ws","path"=>$path,"host"=>$host,"id"=>$uuid);
  $json_dict = json_encode($json_dict); //转化为字符串
  $json_dict = base64_encode($json_dict);
  $json_dict = 'vmess://' . $json_dict;
  return $json_dict;
}

function FinalVmess($v)
{
  $result = '';
  foreach($v as $value){
    $result = $result . $value . PHP_EOL; //PHP_EOL  PHP下在不同系统自动转化对应的换行符
  }
  $result = base64_encode($result);
  return $result;
}

?>

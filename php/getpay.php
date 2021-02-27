<?php
function send_post($url, $post_data) {
  $postdata = http_build_query($post_data);
  $options = array(
    'http' => array(
      'method' => 'POST',
      'header' => 'Content-type:application/x-www-form-urlencoded',
      'content' => $postdata,
      'timeout' => 15 * 60 // 超时时间（单位:s）
    )
  );
  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  return $result;
}

$buymonth = $_POST['buymonth'];
$order_uid = $_POST['webusername'];

if($buymonth == 'month')
{
  $price = '15';
}
if($buymonth == 'season')
{
  $price = '39';
}
if($buymonth == 'year')
{
  $price = '144';
}

$name = '很甜的桔子';
$pay_type = 'alipay';
$order_id = time();
$notify_url = 'http://sssrrr.info/notify.php';

$sign = $name . $pay_type . $price . $order_id . $notify_url . "2a6bfa914f074982a913ef0c0737c692";
$sign = md5($sign);

//使用方法
$post_data = array(
  'name' => $name,
  'pay_type' => $pay_type,
  'price' => $price,
  'order_id' => $order_id,
  'order_uid' => $order_uid,
  'notify_url' => $notify_url,
  'more' => $order_uid,
  'sign' => $sign
);
$result = send_post('https://sssrrr.info/GetPay/', $post_data);
echo $result;

?>

<?php

/*
 * The file is part of the payment lib.
 *
 * (c) Leo <dayugog@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

require_once __DIR__ . '/vendor/autoload.php';

date_default_timezone_set('Asia/Shanghai');
$aliConfig = require_once __DIR__ . '/aliconfig.php';


$name = $_POST['name'];
$price = $_POST['price'];
$order_uid = $_POST['order_uid'];
$more = $_POST['more'];

// 交易信息
$tradeNo = time() . rand(1000, 9999); //先用这里的生成订单
$payData = [
    'body'         => $more,  //商品描述 传Webusername
    'subject'      => '很甜的桔子',  //商品标题
    'trade_no'     => $tradeNo,
    'time_expire'  => time() + 1000, // 表示必须 1000s 内付款
    'amount'       => $price, // 单位为元 ,最小为0.01
    'goods_type'   => '0', // 0—虚拟类商品，1—实物类商品
];


// 使用
try {
    $client = new \Payment\Client(\Payment\Client::ALIPAY, $aliConfig);
    $res    = $client->pay(\Payment\Client::ALI_CHANNEL_QR, $payData);
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
    exit;
} catch (\Payment\Exceptions\GatewayException $e) {
    echo $e->getMessage();
    var_dump($e->getRaw());
    exit;
} catch (\Payment\Exceptions\ClassNotFoundException $e) {
    echo $e->getMessage();
    exit;
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

echo '{"info": {"qr": "' . $res['qr_code'] . '","t_n": "'.$tradeNo.'"}}';

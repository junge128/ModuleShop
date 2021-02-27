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


$trade_no = $_POST['trade_no'];

if(isset($trade_no)){
    $data = [
        //'trade_no' => '15806495958685',
        'transaction_id'     => $trade_no,    // 二者不能同时为空
    ];
    try {
        $client = new \Payment\Client(\Payment\Client::ALIPAY, $aliConfig);
        $res    = $client->tradeQuery($data);
    } catch (InvalidArgumentException $e) {
        echo $e->getMessage();
        exit;
    } catch (\Payment\Exceptions\GatewayException $e) {
        echo $e->getMessage();
        exit;
    } catch (\Payment\Exceptions\ClassNotFoundException $e) {
        echo $e->getMessage();
        exit;
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
    var_dump($res);
}

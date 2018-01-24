<?php
include_once('pingxx_my_model.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $channel = 'wx_pub';//微信公众号支付
    $amount = $_POST['amount'] * 100;
    $rand = rand(100000, 999999);
    $order_no = time() . $rand;
    $openid = $_POST['openid'];
    $extra = array('limit_pay' => '', 'goods_tag' => '', 'open_id' => $openid, 'bank_type' => '');
    $description = '';
    $subject = '购买积分';
    $body = '购买积分';
    $pingxx = new Pingxx_my_model();
    $pingxx->create_charge($channel, $amount, $order_no, $extra, $description, $subject , $body);
}

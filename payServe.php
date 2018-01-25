<?php
include_once('pingpp-php-master/pingxx_my_model.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $channel = 'wx_pub';//微信公众号支付
    $amount = $_POST['amount'] ;
    $rand = rand(100000, 999999);
    $order_no = time() . $rand;
    $openid = $_POST['openid'];
    $extra = array('limit_pay' => '', 'goods_tag' => '', 'open_id' => $openid, 'bank_type' => '');
    $description = '';
    $subject = '购买积分';
    $body = '购买积分';

    $pingxx = new Pingxx_my_model;
    if(Class_exists("Pingxx_my_model")){
        if(is_object($pingxx))
            echo "obj is object";
        else
            echo "obj isnot object";

    }else{
        echo "myclass isnot exists";
    }

//   $charge = $pingxx->create_charge($channel, $amount, $order_no, $extra, $description, $subject , $body);
//    echo json_encode($charge['data']['charge']);
//    echo 'return test!';
}

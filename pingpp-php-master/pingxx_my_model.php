<?php
//文件名 pingxx_my_model.php
include_once(__DIR__.'/pingpp-php-master/init.php'); //引入官方PHP SDK

define('APP_ID', "app_1afr1SiDOSuD0yHe");   //配置应用id
define('APP_KEY', "WechatDueapeZgtx1234987654321012");  //配置应用秘钥
define('PrivateKeyPath', "cert/apiclient_key.pem");  //key

class Pingxx_my_model
{
    private $channel_supported = array(  //支持的支付渠道
        'wx'
    );


    //创建charge对象
    public function create_charge($channel, $amount, $order_no, $extra=array(), $description='', $subject ='', $body=''){
        /*----检查参数格式----*/
        if (!in_array($channel, $this->channel_supported)){
            return array(
                'code' => 0,
                'data' => array(
                    'error_message' => 'channel "'.$channel.'" has not been supported yet'
                )
            );
        }
        if ( $amount<=0 ){
            return array(
                'code' => 0,
                'data' => array(
                    'error_message' => 'amount format invalid'
                )
            );
        }
        if (!preg_match('/^[0-9a-zA-Z]+$/',$order_no)){
            return array(
                'code' => 0,
                'data' => array(
                    'error_message' => 'order_no can`t contain special characters'
                )
            );
        }

        /*----调用下单api----*/
        \Pingpp\Pingpp::setApiKey(APP_KEY);// 设置 API Key
        \Pingpp\Pingpp::setPrivateKeyPath( __DIR__ . "PrivateKeyPath");
        try {
            $charge = \Pingpp\Charge::create(
                array(
                    //请求参数字段规则，请参考 API 文档：https://www.pingxx.com/api#api-c-new
                    'subject'   => $subject ? $subject : 'Your Subject',
                    'body'      => $body ? $body : 'Your Body',
                    'amount'    => $amount,//订单总金额, 人民币单位：分（如订单总金额为 1 元，此处请填 100）
                    'order_no'  => $order_no,// 推荐使用 8-20 位，要求数字或字母，不允许其他字符
                    'currency'  => 'cny',
                    'extra'     => $extra,
                    'channel'   => $channel,// 支付使用的第三方支付渠道取值，请参考：https://www.pingxx.com/api#api-c-new
                    'client_ip' => $_SERVER['REMOTE_ADDR'],// 发起支付请求客户端的 IP 地址，格式为 IPV4，如: 127.0.0.1
                    'app'       => array('id' => APP_ID),
                    'description' => $description
                )
            );
        } catch (\Pingpp\Error\Base $e) {
            // 捕获报错信息
            if ($e->getHttpStatus() != NULL) {
                $data = array(
                    'code' => 0,
                    'data' => array(
                        'error_message' => $e->getHttpBody()
                    )
                );
            } else {
                $data = array(
                    'code' => 0,
                    'data' => array(
                        'error_message' => $e->getMessage()
                    )
                );
            }
            return $data;
        }

        return array(
            'code' => 1,
            'data' => array(
                'charge' => $charge
            )
        );
    }

    //查询charge对象
    public function check_charge($id){
        /*----调用查询api----*/
        \Pingpp\Pingpp::setApiKey(APP_KEY);// 设置 API Key
        try {
            $charge = \Pingpp\Charge::retrieve($id);
            return array(
                'code' => 1,
                'data' => array(
                    'charge' => $charge
                )
            );
        } catch (\Pingpp\Error\Base $e) {
            // 捕获报错信息
            if ($e->getHttpStatus() != NULL) {
                $data = array(
                    'code' => 0,
                    'data' => array(
                        'error_message' => $e->getHttpBody()
                    )
                );
            } else {
                $data = array(
                    'code' => 0,
                    'data' => array(
                        'error_message' => $e->getMessage()
                    )
                );
            }
            return $data;
        }
    }

    //Webhooks回调
    public function Webhooks(){
        $row_data = file_get_contents('php://input');

        //从头信息获取签名
        $headers = \Pingpp\Util\Util::getRequestHeaders();
        $signature = isset($headers['X-Pingplusplus-Signature']) ? $headers['X-Pingplusplus-Signature'] : NULL;

        //验证签名
        $pub_key_path = __DIR__ . "/certs/pingpp_webhooks_public_key.pem"; //Ping++ 公钥
        $pub_key_contents = file_get_contents($pub_key_path);
        $verify_result = openssl_verify($row_data, base64_decode($signature), $pub_key_contents, 'sha256');

        if (!$verify_result){
            return array(
                'code' => 0,
                'data' => array(
                    'error_message' => 'signature verify fail',
                    'event' => $row_data
                ),
            );
        } else{
            return array(
                'code' => 1,
                'data' => array(
                    'event' => $row_data
                ),
            );
        }
    }

    //批量转账
    public function Batch_transfer($batch_no, $description, $recipients){
        /*----检查参数格式----*/
        if (is_array($recipients) && !empty($recipients)){
            $amount = 0;
            $recipient_array = array();
            foreach ($recipients as $item){
                if (isset($item['account']) && $item['account'] && isset($item['amount']) && $item['amount'] && isset($item['name']) && $item['name']){
                    $recipient_array[] = $item;
                    $amount += $item['amount'];
                }
            }
        } else{
            return array(
                'code' => 0,
                'data' => 'invalid $recipients'
            );
        }

        \Pingpp\Pingpp::setApiKey(APP_KEY);// 设置 API Key
        \Pingpp\Pingpp::setPrivateKeyPath( __DIR__ . "/certs/your_rsa_private_key.pem");
        try {
            $batch_transfer = \Pingpp\Batch_transfer::create(
                array(
                    'batch_no'  => $batch_no,
                    'channel'   => 'alipay',
                    'app'       => APP_ID,
                    'amount'    => $amount,//订单总金额, 人民币单位：分（如订单总金额为 1 元，此处请填 100）
                    'currency'  => 'cny',
                    'description' => $description,
                    'type' => 'b2c',
                    'recipients' => $recipient_array,
                )
            );
            return array(
                'code' => 1,
                'data' => array(
                    'batch_transfer' => $batch_transfer
                )
            );

        } catch (\Pingpp\Error\Base $e) {
            // 捕获报错信息
            if ($e->getHttpStatus() != NULL) {
                $data = array(
                    'code' => 0,
                    'data' => array(
                        'error_message' => $e->getHttpBody()
                    )
                );
            } else {
                $data = array(
                    'code' => 0,
                    'data' => array(
                        'error_message' => $e->getMessage()
                    )
                );
            }
            return $data;
        }
    }
}
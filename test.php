<?php

include_once "ConfirmAction/EntryConfirm.php";
include_once "ConfirmAction/DeliveryConfirm.php";
include_once "ConfirmAction/StockOutConfirm.php";
include_once "Sign.php";
include_once "Client.php";
include_once "configuration.php"; ## 配置文件

/**
 * Class test
 * @author Ariel;
 */
class test extends Client
{
    use Configuration;

    private $param;

	public function __construct( $appKey, $secret, $method )
    {
        $this->param = $this->parameters;
        $this->param['app_key'] = $appKey;
        $this->param['secret'] = $secret;
        $this->param['method'] = $method;
    }

    public function createAction()
    {
        return [];
    }

	/**
	 * - 【 请求部分 】
	 */
	public function confirm()
	{
		// 调用入库单确认
		$confirm = new EntryConfirm();

		$postData = $confirm->confirm( 'json' );

		$method = 'Entry.Order';

		$this->param['method'] = $method;

		$signService = new Sign( $this->param );

		$signUrl = $signService->getSignData( $method, $postData );

		$result = $this->request( $postData, $signUrl, 'post', 'json' );

		return $result;
	}
}

/**
 * - [ 接收参数 ]
 * cli mode && fpm mode
 */
if ( php_sapi_name() == 'cli' ) {
    ## todo:: a -> appKey, s -> secret
    $receiveData = getopt('a:s:m:t:'); // 设置参数接收形式
    /**
     * - 【 详细解析，请阅读 README.md 】
     */
    if( !isset( $receiveData['a'] )
        || !isset( $receiveData['s'] )
        || !isset( $receiveData['m'] )
        || !isset( $receiveData['t'] ) )
        exit( "无效的命令模式或无效的传入数据" );

    $appKey = $receiveData['a'];
    $secret = $receiveData['s'];
    $method = $receiveData['m'];
    $status = $receiveData['t'];
}else {
    ## todo:: 参数接收模式
    $appKey = $_REQUEST['appKey'];
    $secret = $_REQUEST['secret'];
    $method = $_REQUEST['method'];
    $status = $_REQUEST['status'];

    if( !$appKey || !$secret || $method || $status )
        exit( "无效的参数模式或无效的传入数据" );
}

$result = new test( $appKey, $secret, $method );

$getData = $result->confirm();

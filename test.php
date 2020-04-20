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

    private $status; // 不记入传输队列

    /**
     * constructor.
     * @param $appKey - app key
     * @param $secret - 密钥
     * @param $method - 接口名称
     * @param $status - 接口状态， create or confirm
     */
	public function __construct( $appKey, $secret, $method, $status )
    {
        $this->param = $this->parameters;
        $this->param['app_key'] = $appKey;
        $this->param['secret'] = $secret;
        $this->param['method'] = $method;
        $this->status = $status;
    }

    public function createAction()
    {
        return [];
    }

	/**
	 * - 【 确认回传, 请求部分 】
	 */
	public function confirm()
	{
	    $requestName = $this->matchMethod();

		// 调用入库单确认
		$confirm = new $requestName();

		$postData = $confirm->confirm( $this->param['format'] );

		$signService = new Sign( $this->param );

		$signUrl = $signService->getSignData( $this->matchMethod(), $postData );

		return $this->request( $postData, $signUrl, 'post', 'json' );
	}

    /**
     * - [ 匹配接口 ]
     * @return string
     */
	private function matchMethod() : string
    {
        $method = $this->param['method'];
        $status = $this->status;

        if ( !in_array( $status, ['create', 'confirm'] ) )
            exit( "无效的传输模式，请确认这是创建队列还是回传队列" );

        if ( $status == 'create' ) {
            $matchMethodName = $this->MethodCreate;

            if ( !isset( $matchMethodName[$method] ) )
                exit( "为匹配到对应的创建接口，错误接口: {$method}" );

            $methodName = $matchMethodName[$method];

        }else {
            $matchMethodName = $this->MethodConfirm;

            if ( !isset( $matchMethodName[$method] ) )
                exit( "为匹配到对应的回传接口，错误接口: {$method}" );

            $methodName = $matchMethodName[$method];
        }
        return $methodName;
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

    if( !$appKey || !$secret || !$method || !$status )
        exit( "无效的参数模式或无效的传入数据" );
}

$result = new test( $appKey, $secret, $method, $status );

$getData = $result->confirm();

print_r( $getData );

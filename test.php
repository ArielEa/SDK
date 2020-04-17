<?php 

include_once "ConfirmAction/EntryConfirm.php";
include_once "ConfirmAction/DeliveryConfirm.php";
include_once "ConfirmAction/StockOutConfirm.php";
include_once "Sign.php";
include_once "Client.php";

/**
 * - 【 测试请求 】
 */
class test extends Client
{
	private $param = [
		'app_key' => 'wmstest', // app_id
		'secret' => 'wms123456', // secret
		'timestamp' => '',
		'method'   => '',
		'format'   => 'json',
		'sign_method' => 'md5'
    ];

    public function createAction()
    {
        return $result;
    }

	/**
	 * - 【 请求部分 】
	 */
	public function confirm()
	{
		// 调用入库单确认
		$confirm = new EntryConfirm();

		$postData = $confirm->entry_confirm( 'json' );

		$method = 'Entry.Order';

		$this->param['method'] = $method;

		$signService = new Sign( $this->param );

		$signUrl = $signService->getSignData( $method, $postData );

		$result = $this->request( $postData, $signUrl, 'post', 'json' );

		return $result;
	}
}

$result = new test();

$getData = $result->confirm();

print_r( $getData );

echo PHP_EOL;

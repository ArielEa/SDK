<?php
include_once "configuration.php";  ## 配置文件

/**
 * 传递数据说明
 * @author Ariel.
 * @param  $param = [
			'appKey' => '12344',
			'method' => 'Entry.Order',
			'timestamp' => '2020-03-27 00:00:00',
			'sign'	 => '签名'
 		];
 */
class Sign
{
    use Configuration;

	private $param = [];

	private $secret;

	private $appkey;

	public function __construct( $parameters )
	{
        $this->secret = $parameters['secret'];

      	$this->appkey = $parameters['app_key'];

        unset( $parameters['secret'] );

      	$parameters['timestamp'] = date( "Y-m-d H:i:s", time() );

        $this->param = $parameters;
	}

    /**
     *  - 【 签名xml版本 】
     * @param $secret
     * @param $param
     * @param $body
     * @return string
     */
    public function signXml( $secret, $param, $body ) :string
    {
        if ( empty($body) ) {
            exit('Body can\'t empty!');
        }

        if ( empty($secret) ) {
            exit('Secret error!');
        }

        ksort($param);
        $outputStr = '';
        foreach ($param as $k => &$v) {
            if ( empty($v) ) {
                exit('Param can\'t error!');
            }
            $outputStr .= $k . $v;
        }


        $outputStr = $secret . $outputStr . $body . $secret;

        return strtoupper(md5($outputStr));
    }

    /**
     *  - 【 签名json版本 】
     * @param $secret
     * @param $param
     * @param $body
     * @return string
     */
    public function signJson( $secret, $param, $body ) :string
    {
        if ( empty($body) ) 
        	exit('Body can\'t empty!');

        if ( !is_array( json_decode( $body, true ) ) )
        	exit('Invalid Body!');

        if ( empty($secret) ) 
        	exit('Secret error!');

        ksort( $param );

        $outputStr = '';

        foreach ($param as $k => &$v) {
            if ( empty($v) ) {
                exit('Param can\'t error!');
            }
            $outputStr .= $k . $v;
        }

        $outputStr = $secret . $outputStr . $body . $secret;

        return strtoupper(md5($outputStr));
    }

    /**
     * - 【 获取签名数据，并且返回 】 
     * @param null $method
     * @param null $body
     * @return string
     */
    public function getSignData($method = null, $body = null) : string
    {
        $prefixUrl = $this->remoteUrl.$this->route;
        $this->param['method']    = $method;
        $this->param['timestamp'] = date("Y-m-d H:i:s");
        $this->param['sign']      = $this->signJson($this->secret, $this->param , $body);  
        return  $prefixUrl . "?" . http_build_query($this->param);
    }
}

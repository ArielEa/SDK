<?php

class Client
{
	private $postUrl; // 设置地址信息

    private $postData; // 发送数据

    private $method; // get / post

    private $postType; // xml/json

    /**
     * @param $postData
     * @param $postUrl
     * @param $method
     * @param $postType
     * @return array
     */
    public function request( $postData, $postUrl, $method, $postType )
    {
        $this->postUrl  = $postUrl;
        $this->postData = $postData;
        $this->method   = $method;
        $this->postType = $postType;

        $result = $this->curl();

        // if ( $postType == 'json' ){
        //     return $this->JsonParson( $result );
        // }else if ( $postType == 'xml' ){
        //     return $this->xmlParse( $result );
        // }else {
        //     exit();
        // }

        return $result;
    }

	/**
	 * - 【 发送请求 】
	 * @param $postData - 数据
	 * @param $method 
	 * @param $postType - [  xml, json ]
	 */
	public function curl() : string
	{
		$ch = curl_init();

        $postType = $this->postType;

        // postType => json/xml
        $header[] = "Content-type: application/{$postType}";


        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_URL, $this->postUrl);
        curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        if (strtolower( $this->method ) == 'post') {
            curl_setopt ( $ch, CURLOPT_POST, 1 );
            curl_setopt ( $ch, CURLOPT_POSTFIELDS, $this->postData );
        }
        
        $return = curl_exec($ch);
        
        curl_close($ch);

        return $return;
	}


    /**
     * - 【 解析xml数据 】
     * @param $xmlData
     * @return mixed
     */
    public function xmlParse( $xmlData ) : array
    {
        libxml_disable_entity_loader(true);
        $values = json_decode(json_encode(simplexml_load_string($xmlData, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $values;
    }

    /**
     * - 【 解析json数据 】
     * @param $jsonData
     * @return mixed
     */
    public function JsonParson( $jsonData ) : array
    {
        return $jsonData ? json_decode( $jsonData, true ) : [] ;
    }

}
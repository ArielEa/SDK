<?php

/**
 * - 配置参数
 * - 由于SDK和部分系统的原因，不使用yaml，xml此类的配置读取方式，采用php的配置方式，方便修改与调试
 * @author Ariel.
 * Trait Configuration
 */
Trait Configuration
{
	protected $remoteUrl = "https://xxxx.com"; // 请自行设置

	protected $route = "/router/service"; // 请自行设置

	protected $parameters = [
        'app_key' => '', // app_id
        'secret' => '', // secret
        'timestamp' => '',
        'method'   => '',
        'format'   => 'json', // 固定值
        'sign_method' => 'md5' // 固定值
    ];

    /**
     * - [ 创建 method 匹配 ]
     * @var array
     */
	protected $MethodCreate = [
        'Entry.create'     => 'EntryCreate',
        'Delivery.create'  => 'DeliveryCreate',
        'Stock.out.create' => 'StockOutCreate',
        'Refund.create'    => 'RefundCreate'
    ];

    /**
     * - [ 回传确认 method 匹配 ]
     * @var array
     */
	protected $MethodConfirm = [
	    'Entry.order'     => 'EntryConfirm',
        'Delivery.order'  => 'DeliveryConfirm',
        'Stock.out.order' => 'StockOutConfirm',
        'Refund.order'    => 'RefundConfirm'
    ];
}
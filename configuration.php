<?php

/**
 * - 配置参数
 * - 由于SDK和部分系统的原因，不使用yaml，xml此类的配置读取方式，采用php的配置方式，方便修改与调试
 * @author Ariel.
 * Trait Configuration
 */
Trait Configuration
{
	protected $remoteUrl = "xxx";

	protected $route = "/router/service";

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
        'Entry.Create'     => 'EntryCreate',
        'Delivery.Create'  => 'DeliveryCreate',
        'Stock.out.Create' => 'StockOutCreate',
        'Refund.Create'    => 'RefundCreate'
    ];

    /**
     * - [ 回传 method 匹配 ]
     * @var array
     */
	protected $MethodConfirm = [
	    'Entry.Order'     => 'EntryConfirm',
        'Delivery.Order'  => 'DeliveryConfirm',
        'Stock.out.Order' => 'StockOutConfirm',
        'Refund.Order'    => 'RefundConfirm'
    ];
}
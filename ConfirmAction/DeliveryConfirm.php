<?php

include_once __DIR__."/../Message.php";
include_once "Confirm.php";

/**
 * - 【 特别注意，发货不会发出残品，默认正品发货 】
 * 接口 method : Delivery.order
 * Demo DeliveryConfirm 销售出库/发货单
 */
class DeliveryConfirm extends Message
{
    /**
     * @param string $postType
     * @return string
     */
	public function confirm( $postType = 'json' ) : string
	{
        $_params = $this->getData();
        
        return $this->convertJson( $_params );
	}

    /**
     * @return array
     */
	public function getData() : array
	{
		$postData = [
			'deliveryOrder' => [
				'deliveryOrderCode' => 'D2020001',  // 销售单号(必)
				'deliveryOrderId'	=> 1000,	// 销售编号(选)
				'warehouseCode'	 	=> 'test_warehouse', // 出库仓库编码(必)
				'orderConfirmTime'  => '2020-03-27 00:00:00', // 回传时间(选)
				'orderType'	 		=> 'JYCK',	// 固定，回传状态值（必填）
				'outBizCode'	 	=> 1,  // 外部编码(选填)
			],

			'packages' => [
				[
					'logisticsCode' => 'SF', // 物流公司编码(必填)
					'expressCode'	=> 'SF21633111', // 运单号(必填)
					'weight'		=> '315.0000', // 重量(选填)
					'extendProps'	=> [
						// 自定义字段存储地址，需要双方系统协商
						'attribute1' => '',
						'attribute2' => '',
					], 
					'items'			=> [
						[
							'itemCode' => 'F001', // 商品编码
							'quantity' => 1		 // 该商品的全部出库数量
						],
						[
							'itemCode' => 'F002',
							'quantity' => 1
						],
					]
				],
			],
			'orderLines' => [
				[
					'itemId'	=> 1234,	// 系统商品id (必填)
					'itemCode'	=> 'F001',  // 商品编码 ( 必填 )
					'batchCode'	=> 'A-001', // 批次编码 (选填)
					'productDate' => '2020-03-27 11:00:00', // 批次生产日期, (选填)
					'expireDate'  => '2022-03-27 11:00:00', // 批次过期日期, (选填)
					'actualQty'	  => 1, // 数量
					'inventoryType' => 'ZP' // 正品 ZP, 残品 CC
				],
				[
					'itemId'	=> 1234,	// 系统商品id
					'itemCode'	=> 'F002',  // 商品编码
					'batchCode'	=> 'A-001',
					'productDate' => '2020-03-27 11:00:00',
					'expireDate'  => '2022-03-27 11:00:00',
					'actualQty'	  => 1,
					'inventoryType' => 'ZP'
				],
			]
		];
		return $postData;
	}

}
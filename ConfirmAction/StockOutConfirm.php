<?php

include_once __DIR__."/../Message.php";

/**
 * - 【 出库单，大批量货品出库直走接口 】
 * 接口 method : Stock.out.order
 * Demo DeliveryConfirm 销售出库/发货单
 */
class StockOutConfirm extends Message
{
	public function Stock_out_confirm( $postType = 'json' ) : string
	{
		$_params = $this->getData();
        
        $postData = $this->convertJson( $_params );

		return $postData;

	}

	public function getData() : array
	{
		$postData = [
			'deliveryOrder' => [
				'deliveryOrderCode' => 'D2020001',  // 出库单号(必)
				'deliveryOrderId'	=> 1000,	// 出库编号(选)
				'warehouseCode'	 	=> 'test_warehouse', // 出库仓库编码(必)
				'orderConfirmTime'  => '2020-03-27 00:00:00', // 回传时间(选)
				'orderType'	 		=> 'PTCK',	// 固定，回传状态值（必填）
			],
			'orderLines' => [
				[
					'itemId'	=> 1234,	// 系统商品id (必填)
					'itemCode'	=> 'F001',  // 商品编码 ( 必填 )
					'batchCode'	=> 'A-001', // 批次编码 (选填)
					'productDate' => '2020-03-27 11:00:00', // 批次生产日期, (选填)
					'expireDate'  => '2022-03-27 11:00:00', // 批次过期日期, (选填)
					'actualQty'	  => 10, // 数量
					'inventoryType' => 'ZP' // 正品 ZP, 残品 CC
				],
				[
					'itemId'	=> 1234,	// 系统商品id
					'itemCode'	=> 'F002',  // 商品编码
					'batchCode'	=> 'A-001',
					'productDate' => '2020-03-27 11:00:00',
					'expireDate'  => '2022-03-27 11:00:00',
					'actualQty'	  => 10,
					'inventoryType' => 'ZP'
				],
			]
		];
		return $postData;
	}
}
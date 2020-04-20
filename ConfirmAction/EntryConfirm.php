<?php

include_once __DIR__."/../Message.php";
include_once "Confirm.php";

/**
 * 接口 method : entry.order
 * Demo Entry 入库单部分（PO单）
 */
class EntryConfirm extends Message implements Confirm
{
    public function confirm( $postType = 'json' ): string
	{   
        $_params = $this->getData();
        
        $postData = $this->convertJson( $_params );
        
        return $postData;
	}

	public function getData() : array
	{
		$postData = [
			'entryOrder' => [
				'entryOrderCode' => 'E2020001',  // 入库单号(必)
				'entryOrderId'	 => 1000,	// 入库编号(选)
				'warehouseCode'	 => 'test_warehouse', // 入库仓库编码(必)
				'entryOrderType' => 'QTRK',	// 入库类型, 恒定
				'outBizCode'	 => '',	// 外部编码(选)
				'confirmType'	 => 1, // 1 完成, 0 未完成
				'status'		 => 'FULFILLED', // 完成状态(必填)
				'remark'		 => '备注'
			],
			'orderLines' => [
				[
					'itemId'	=> 1234,	// 系统商品id (必填)
					'itemCode'	=> 'F001',  // 商品编码 ( 必填 )
					'batchCode'	=> 'A-001', // 批次编码 (选填)
					'productDate' => '2020-03-27 11:00:00', // 批次生产日期, (选填)
					'expireDate'  => '2022-03-27 11:00:00', // 批次过期日期, (选填)
					'actualQty'	  => 50, // 数量
					'inventoryType' => 'ZP' // 正品 ZP, 残品 CC
				],
				[
					'itemId'	=> 1234,	// 系统商品id
					'itemCode'	=> 'F001',  // 商品编码
					'batchCode'	=> 'A-002',
					'productDate' => '2020-03-27 11:00:00',
					'expireDate'  => '2022-03-27 11:00:00',
					'actualQty'	  => 50,
					'inventoryType' => 'CC'
				],
			]
		];

		return $postData;
	}
}

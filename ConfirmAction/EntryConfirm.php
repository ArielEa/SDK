<?php

include_once __DIR__."/../Message.php";
include_once "Confirm.php";
include_once __DIR__."/../ApiParameters/EntryParameters.php";

/**
 * 接口 method : entry.order
 * Demo Entry 入库单部分（PO单）
 */
class EntryConfirm extends Message implements Confirm
{
    public function confirm( $postType = 'json' ): string
	{
        $_params = $this->getData();
        
        return $this->convertJson( $_params );
	}

    /**
     * - [ 组合数据 ]
     * @return array
     */
	public function getData() : array
	{
	    $entry = new Entry;
	    $entry->setEntryOrderCode( 'E2001' );
	    $entry->setEntryOrderId( 1000 );
	    $entry->setWarehouseCode('test_warehouse_code');
	    $entry->setEntryOrderType( 'QTRK' );
	    $entry->setOutBizCode( '' );
	    $entry->setConfirmType( 1 );
	    $entry->setStatus( 'FULFILLED' );
	    $entry->setRemark( '备注' );
	    $items = new OrderLine;
	    $items->setItemId( 1234 );
	    $items->setItemCode( 'F001' );
	    $items->setBatchCode( 'A-001' );
	    $items->setProductDate( '2020-03-27 11:00:00' );
	    $items->setExpireDate( '2022-03-27 11:00:00' );
	    $items->setActualQty( 50 );
	    $items->setInventoryType( 'ZP' );
	    $entry->setItems( $items );
        $items = new OrderLine;
        $items->setItemId( 12345 );
        $items->setItemCode( 'F002' );
        $items->setBatchCode( 'A-002' );
        $items->setProductDate( '2020-03-20 11:00:00' );
        $items->setExpireDate( '2022-03-20 11:00:00' );
        $items->setActualQty( 500 );
        $items->setInventoryType( 'ZP' );
        $entry->setItems( $items );
		return json_decode( json_encode( $entry ), true );
	}
}

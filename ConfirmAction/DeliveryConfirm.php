<?php

include_once __DIR__."/../Message.php";
include_once "Confirm.php";
include_once __DIR__."/../ApiParameters/DeliveryParameters.php";

/**
 * - 【 特别注意，发货不会发出残品，默认正品发货 】
 * 接口 method : Delivery.order
 * Demo DeliveryConfirm 销售出库/发货单
 */
class DeliveryConfirm extends Message implements Confirm
{
    /**
     * @param string $postType
     * @return string
     */
	public function confirm( $postType = 'json' ) : string
	{

	    if ( $postType == 'json' ) {
            $_params = $this->getData();

            return $this->convertJson( $_params );
        }
	}

    /**
     * @return array
     */
	public function getData() : array
	{
	    $delivery = new Delivery;
	    $delivery->setDeliveryOrderCode( 'D20200001' );
	    $delivery->setDeliveryOrderId( 1000 );
	    $delivery->setWarehouseCode('test_warehouse_code');
	    $delivery->setOrderConfirmTime( '2020-04-22 12:00:00' );
	    $delivery->setOrderType( 'JYCK' );
	    $delivery->setOutBizCode( 1 );
	    $package = new DeliveryPackage;
	    $package->setLogisticsCode( 'SF' );
	    $package->setExpressCode( 'SF2022110011' );
	    $package->setWeight( '315.00' );
	    $packageItem = new DeliveryPackageItems;
	    $packageItem->setItemCode( 'F001' );
	    $packageItem->setQuantity( 1 );
	    $package->setItems( $packageItem );
        $packageItem = new DeliveryPackageItems;
        $packageItem->setItemCode( 'F002' );
        $packageItem->setQuantity( 1 );
        $package->setItems( $packageItem );
        $delivery->setPackage( $package );
        $items = new DeliveryItem;
        $items->setItemId( 1234 );
        $items->setItemCode( 'F001' );
        $items->setBatchCode('' );
        $items->setProductDate( '' );
        $items->setExpireDate( '' );
        $items->setActualQty( 1 );
        $items->setInventoryType( 'ZP' );
        $delivery->setOrderLines( $items );
        $items = new DeliveryItem;
        $items->setItemId( 1234 );
        $items->setItemCode( 'F002' );
        $items->setBatchCode('' );
        $items->setProductDate( '' );
        $items->setExpireDate( '' );
        $items->setActualQty( 1 );
        $items->setInventoryType( 'ZP' );
        $delivery->setOrderLines( $items );
		return json_decode( json_encode( $delivery ), true );
	}

}
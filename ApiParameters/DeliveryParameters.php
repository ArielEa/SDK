<?php

class Delivery
{
    public $deliveryOrderCode; // 发货单号/销售单号 必填

    public $deliveryOrderId; // 销售 ID，可选

    public $warehouseCode; // 仓库编码, 必填

    public $orderConfirmTime; // 仓库确认回传时间， 必填

    public $orderType; // 固定, "JYCK"， 必填

    public $outBizCode; // 外部编码, 可选

    public $package = []; // 物流包信息

    public $orderLines = []; // 商品详情

    /**
     * @return mixed
     */
    public function getDeliveryOrderCode()
    {
        return $this->deliveryOrderCode;
    }

    /**
     * @param mixed $deliveryOrderCode
     */
    public function setDeliveryOrderCode($deliveryOrderCode): void
    {
        $this->deliveryOrderCode = $deliveryOrderCode;
    }

    /**
     * @return mixed
     */
    public function getDeliveryOrderId()
    {
        return $this->deliveryOrderId;
    }

    /**
     * @param mixed $deliveryOrderId
     */
    public function setDeliveryOrderId($deliveryOrderId): void
    {
        $this->deliveryOrderId = $deliveryOrderId;
    }

    /**
     * @return mixed
     */
    public function getWarehouseCode()
    {
        return $this->warehouseCode;
    }

    /**
     * @param mixed $warehouseCode
     */
    public function setWarehouseCode($warehouseCode): void
    {
        $this->warehouseCode = $warehouseCode;
    }

    /**
     * @return mixed
     */
    public function getOrderConfirmTime()
    {
        return $this->orderConfirmTime;
    }

    /**
     * @param mixed $orderConfirmTime
     */
    public function setOrderConfirmTime($orderConfirmTime): void
    {
        $this->orderConfirmTime = $orderConfirmTime;
    }

    /**
     * @return mixed
     */
    public function getOrderType()
    {
        return $this->orderType;
    }

    /**
     * @param mixed $orderType
     */
    public function setOrderType($orderType): void
    {
        $this->orderType = $orderType;
    }

    /**
     * @return mixed
     */
    public function getOutBizCode()
    {
        return $this->outBizCode;
    }

    /**
     * @param mixed $outBizCode
     */
    public function setOutBizCode($outBizCode): void
    {
        $this->outBizCode = $outBizCode;
    }

    /**
     * @return array
     */
    public function getPackage(): array
    {
        return $this->package;
    }

    /**
     * @param array $package
     */
    public function setPackage($package)
    {
        $package = [ json_decode( json_encode( $package ), true ) ];
        $packages = array_merge( $this->orderLines , $package );
        $this->package = $packages;
    }

    /**
     * @return array
     */
    public function getOrderLines(): array
    {
        return $this->orderLines;
    }

    /**
     * @param array $orderLines
     */
    public function setOrderLines($orderLines)
    {
        $items = [ json_decode( json_encode( $orderLines ), true ) ];
        $item = array_merge( $this->orderLines , $items );
        $this->orderLines = $item;
    }
}

class DeliveryPackage
{
    public $logisticsCode; // 物流单号

    public $expressCode; // 运单号

    public $weight; // 重量

    public $items = []; // 包裹信息

    /**
     * @return mixed
     */
    public function getLogisticsCode()
    {
        return $this->logisticsCode;
    }

    /**
     * @param mixed $logisticsCode
     */
    public function setLogisticsCode($logisticsCode): void
    {
        $this->logisticsCode = $logisticsCode;
    }

    /**
     * @return mixed
     */
    public function getExpressCode()
    {
        return $this->expressCode;
    }

    /**
     * @param mixed $expressCode
     */
    public function setExpressCode($expressCode): void
    {
        $this->expressCode = $expressCode;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems( $items )
    {
        $packageItems = [ json_decode( json_encode( $items ), true ) ];
        $packageItem = array_merge( $this->items , $packageItems );

        $this->items = $packageItem;
    }

}

class DeliveryPackageItems
{
    public $itemCode;

    public $quantity;

    /**
     * @return mixed
     */
    public function getItemCode()
    {
        return $this->itemCode;
    }

    /**
     * @param mixed $itemCode
     */
    public function setItemCode($itemCode): void
    {
        $this->itemCode = $itemCode;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }
}

class DeliveryItem
{
    public $itemId;	 // 系统商品id (必填)

    public $itemCode;	 // 商品编码 ( 必填 )

    public $batchCode;	 // 批次编码 (选填)

    public $productDate;  // 批次生产日期, (选填)

    public $expireDate;  // 批次过期日期, (选填)

    public $actualQty; 	   // 数量

    public $inventoryType;

    /**
     * @return mixed
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @param mixed $itemId
     */
    public function setItemId($itemId): void
    {
        $this->itemId = $itemId;
    }

    /**
     * @return mixed
     */
    public function getItemCode()
    {
        return $this->itemCode;
    }

    /**
     * @param mixed $itemCode
     */
    public function setItemCode($itemCode): void
    {
        $this->itemCode = $itemCode;
    }

    /**
     * @return mixed
     */
    public function getBatchCode()
    {
        return $this->batchCode;
    }

    /**
     * @param mixed $batchCode
     */
    public function setBatchCode($batchCode): void
    {
        $this->batchCode = $batchCode;
    }

    /**
     * @return mixed
     */
    public function getProductDate()
    {
        return $this->productDate;
    }

    /**
     * @param mixed $productDate
     */
    public function setProductDate($productDate): void
    {
        $this->productDate = $productDate;
    }

    /**
     * @return mixed
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    /**
     * @param mixed $expireDate
     */
    public function setExpireDate($expireDate): void
    {
        $this->expireDate = $expireDate;
    }

    /**
     * @return mixed
     */
    public function getActualQty()
    {
        return $this->actualQty;
    }

    /**
     * @param mixed $actualQty
     */
    public function setActualQty($actualQty): void
    {
        $this->actualQty = $actualQty;
    }

    /**
     * @return mixed
     */
    public function getInventoryType()
    {
        return $this->inventoryType;
    }

    /**
     * @param mixed $inventoryType
     */
    public function setInventoryType($inventoryType): void
    {
        $this->inventoryType = $inventoryType;
    }  // 正品 ZP, 残品 CC
}
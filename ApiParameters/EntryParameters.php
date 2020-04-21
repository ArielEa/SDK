<?php

class Entry
{
    public  $entryOrderCode; // 入库单号(必)

    public  $entryOrderId;	  // 入库编号(选)

    public  $warehouseCode;  // 入库仓库编码(必)

    public  $entryOrderType; // 入库类型, 恒定, (QTRK)

    public  $outBizCode;	  // 外部编码(选)

    public  $confirmType;	  // 1 完成, 0 未完成

    public  $status;		  // 完成状态(必填)

    public  $remark;

    public $items = [];

    /**
     * @return mixed
     */
    public function getEntryOrderCode()
    {
        return $this->entryOrderCode;
    }

    /**
     * @param mixed $entryOrderCode
     */
    public function setEntryOrderCode($entryOrderCode): void
    {
        $this->entryOrderCode = $entryOrderCode;
    }

    /**
     * @return mixed
     */
    public function getEntryOrderId()
    {
        return $this->entryOrderId;
    }

    /**
     * @param mixed $entryOrderId
     */
    public function setEntryOrderId($entryOrderId): void
    {
        $this->entryOrderId = $entryOrderId;
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
    public function getEntryOrderType()
    {
        return $this->entryOrderType;
    }

    /**
     * @param mixed $entryOrderType
     */
    public function setEntryOrderType($entryOrderType): void
    {
        $this->entryOrderType = $entryOrderType;
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
     * @return mixed
     */
    public function getConfirmType()
    {
        return $this->confirmType;
    }

    /**
     * @param mixed $confirmType
     */
    public function setConfirmType($confirmType): void
    {
        $this->confirmType = $confirmType;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * @param mixed $remark
     */
    public function setRemark($remark): void
    {
        $this->remark = $remark;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems( $items )
    {
        $items = [ json_decode( json_encode( $items ), true ) ];
        $item = array_merge( $this->items , $items );
        $this->items = $item;
    }

}

class OrderLine
{
    public $itemId;	// 系统商品id (必填)

    public $itemCode;	// 商品编码 ( 必填 )

    public $batchCode;	 //批次编码 (选填)

    public $productDate;   // 批次生产日期, (选填)

    public $expireDate;   // 批次过期日期, (选填)

    public $actualQty;	    // 数量

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
    }
}
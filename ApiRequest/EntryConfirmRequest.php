<?php

/**
 *  - [ 入库单确认接口 ]
 * Class EntryConfirmRequest
 */
class EntryConfirmRequest
{
    public $methodName;

    public $entryOrder;

    public $orderLines;

    public $apiPara = [];

    public function setMethodName( $methodName )
    {
        $this->methodName = $methodName;
    }

    public function getMethodName()
    {
        return $this->methodName;
    }

    public function setEntryOrder( $entryOrder = [] )
    {
        $this->entryOrder = $entryOrder;
        $this->apiPara['entryOrder'] = $entryOrder;
    }

    public function getEntryOrder()
    {
        return $this->entryOrder;
    }

    public function setOrderLines( $orderLines )
    {
        $this->orderLines = $orderLines;
        $this->apiPara['orderLines'] = $orderLines;
    }

    public function getOrderLines()
    {
        return $this->orderLines;
    }

    public function getApiParas()
    {
        return $this->apiPara;
    }

    public function check()
    {
        # todo:: check information
    }

}
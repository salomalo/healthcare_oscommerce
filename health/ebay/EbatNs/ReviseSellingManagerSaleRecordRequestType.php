<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'SellingManagerSoldOrderType.php';
require_once 'OrderIDType.php';
require_once 'AbstractRequestType.php';
require_once 'ItemIDType.php';

class ReviseSellingManagerSaleRecordRequestType extends AbstractRequestType
{
	// start props
	// @var ItemIDType $ItemID
	var $ItemID;
	// @var string $TransactionID
	var $TransactionID;
	// @var OrderIDType $OrderID
	var $OrderID;
	// @var SellingManagerSoldOrderType $SellingManagerSoldOrder
	var $SellingManagerSoldOrder;
	// end props

/**
 *

 * @return ItemIDType
 */
	function getItemID()
	{
		return $this->ItemID;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setItemID($value)
	{
		$this->ItemID = $value;
	}
/**
 *

 * @return string
 */
	function getTransactionID()
	{
		return $this->TransactionID;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setTransactionID($value)
	{
		$this->TransactionID = $value;
	}
/**
 *

 * @return OrderIDType
 */
	function getOrderID()
	{
		return $this->OrderID;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setOrderID($value)
	{
		$this->OrderID = $value;
	}
/**
 *

 * @return SellingManagerSoldOrderType
 */
	function getSellingManagerSoldOrder()
	{
		return $this->SellingManagerSoldOrder;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setSellingManagerSoldOrder($value)
	{
		$this->SellingManagerSoldOrder = $value;
	}
/**
 *

 * @return 
 */
	function ReviseSellingManagerSaleRecordRequestType()
	{
		$this->AbstractRequestType('ReviseSellingManagerSaleRecordRequestType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'ItemID' =>
				array(
					'required' => false,
					'type' => 'ItemIDType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'TransactionID' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'OrderID' =>
				array(
					'required' => false,
					'type' => 'OrderIDType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'SellingManagerSoldOrder' =>
				array(
					'required' => false,
					'type' => 'SellingManagerSoldOrderType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>

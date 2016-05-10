<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'OrderIDType.php';

class OrderIDArrayType extends EbatNs_ComplexType
{
	// start props
	// @var OrderIDType $OrderID
	var $OrderID;
	// end props

/**
 *

 * @return OrderIDType
 * @param  $index 
 */
	function getOrderID($index = null)
	{
		if ($index) {
		return $this->OrderID[$index];
	} else {
		return $this->OrderID;
	}

	}
/**
 *

 * @return void
 * @param  $value 
 * @param  $index 
 */
	function setOrderID($value, $index = null)
	{
		if ($index) {
	$this->OrderID[$index] = $value;
	} else {
	$this->OrderID = $value;
	}

	}
/**
 *

 * @return 
 */
	function OrderIDArrayType()
	{
		$this->EbatNs_ComplexType('OrderIDArrayType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'OrderID' =>
				array(
					'required' => false,
					'type' => 'OrderIDType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => true,
					'cardinality' => '0..*'
				)
			));

	}
}
?>
<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'AbstractResponseType.php';
require_once 'PaginationResultType.php';
require_once 'SellingManagerProductType.php';

class GetSellingManagerInventoryResponseType extends AbstractResponseType
{
	// start props
	// @var dateTime $InventoryCountLastCalculatedDate
	var $InventoryCountLastCalculatedDate;
	// @var SellingManagerProductType $SellingManagerProduct
	var $SellingManagerProduct;
	// @var PaginationResultType $PaginationResult
	var $PaginationResult;
	// end props

/**
 *

 * @return dateTime
 */
	function getInventoryCountLastCalculatedDate()
	{
		return $this->InventoryCountLastCalculatedDate;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setInventoryCountLastCalculatedDate($value)
	{
		$this->InventoryCountLastCalculatedDate = $value;
	}
/**
 *

 * @return SellingManagerProductType
 * @param  $index 
 */
	function getSellingManagerProduct($index = null)
	{
		if ($index) {
		return $this->SellingManagerProduct[$index];
	} else {
		return $this->SellingManagerProduct;
	}

	}
/**
 *

 * @return void
 * @param  $value 
 * @param  $index 
 */
	function setSellingManagerProduct($value, $index = null)
	{
		if ($index) {
	$this->SellingManagerProduct[$index] = $value;
	} else {
	$this->SellingManagerProduct = $value;
	}

	}
/**
 *

 * @return PaginationResultType
 */
	function getPaginationResult()
	{
		return $this->PaginationResult;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setPaginationResult($value)
	{
		$this->PaginationResult = $value;
	}
/**
 *

 * @return 
 */
	function GetSellingManagerInventoryResponseType()
	{
		$this->AbstractResponseType('GetSellingManagerInventoryResponseType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'InventoryCountLastCalculatedDate' =>
				array(
					'required' => false,
					'type' => 'dateTime',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'SellingManagerProduct' =>
				array(
					'required' => false,
					'type' => 'SellingManagerProductType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => true,
					'cardinality' => '0..*'
				),
				'PaginationResult' =>
				array(
					'required' => false,
					'type' => 'PaginationResultType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>
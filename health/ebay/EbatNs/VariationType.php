<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'SellingManagerProductInventoryStatusType.php';
require_once 'SKUType.php';
require_once 'EbatNs_ComplexType.php';
require_once 'NameValueListArrayType.php';
require_once 'SellingStatusType.php';
require_once 'AmountType.php';

class VariationType extends EbatNs_ComplexType
{
	// start props
	// @var SKUType $SKU
	var $SKU;
	// @var AmountType $StartPrice
	var $StartPrice;
	// @var int $Quantity
	var $Quantity;
	// @var NameValueListArrayType $VariationSpecifics
	var $VariationSpecifics;
	// @var int $UnitsAvailable
	var $UnitsAvailable;
	// @var AmountType $UnitCost
	var $UnitCost;
	// @var SellingStatusType $SellingStatus
	var $SellingStatus;
	// @var string $VariationTitle
	var $VariationTitle;
	// @var anyURI $VariationViewItemURL
	var $VariationViewItemURL;
	// @var boolean $Delete
	var $Delete;
	// @var SellingManagerProductInventoryStatusType $SellingManagerProductInventoryStatus
	var $SellingManagerProductInventoryStatus;
	// @var long $WatchCount
	var $WatchCount;
	// end props

/**
 *

 * @return SKUType
 */
	function getSKU()
	{
		return $this->SKU;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setSKU($value)
	{
		$this->SKU = $value;
	}
/**
 *

 * @return AmountType
 */
	function getStartPrice()
	{
		return $this->StartPrice;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setStartPrice($value)
	{
		$this->StartPrice = $value;
	}
/**
 *

 * @return int
 */
	function getQuantity()
	{
		return $this->Quantity;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setQuantity($value)
	{
		$this->Quantity = $value;
	}
/**
 *

 * @return NameValueListArrayType
 */
	function getVariationSpecifics()
	{
		return $this->VariationSpecifics;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setVariationSpecifics($value)
	{
		$this->VariationSpecifics = $value;
	}
/**
 *

 * @return int
 */
	function getUnitsAvailable()
	{
		return $this->UnitsAvailable;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setUnitsAvailable($value)
	{
		$this->UnitsAvailable = $value;
	}
/**
 *

 * @return AmountType
 */
	function getUnitCost()
	{
		return $this->UnitCost;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setUnitCost($value)
	{
		$this->UnitCost = $value;
	}
/**
 *

 * @return SellingStatusType
 */
	function getSellingStatus()
	{
		return $this->SellingStatus;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setSellingStatus($value)
	{
		$this->SellingStatus = $value;
	}
/**
 *

 * @return string
 */
	function getVariationTitle()
	{
		return $this->VariationTitle;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setVariationTitle($value)
	{
		$this->VariationTitle = $value;
	}
/**
 *

 * @return anyURI
 */
	function getVariationViewItemURL()
	{
		return $this->VariationViewItemURL;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setVariationViewItemURL($value)
	{
		$this->VariationViewItemURL = $value;
	}
/**
 *

 * @return boolean
 */
	function getDelete()
	{
		return $this->Delete;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setDelete($value)
	{
		$this->Delete = $value;
	}
/**
 *

 * @return SellingManagerProductInventoryStatusType
 */
	function getSellingManagerProductInventoryStatus()
	{
		return $this->SellingManagerProductInventoryStatus;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setSellingManagerProductInventoryStatus($value)
	{
		$this->SellingManagerProductInventoryStatus = $value;
	}
/**
 *

 * @return long
 */
	function getWatchCount()
	{
		return $this->WatchCount;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setWatchCount($value)
	{
		$this->WatchCount = $value;
	}
/**
 *

 * @return 
 */
	function VariationType()
	{
		$this->EbatNs_ComplexType('VariationType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'SKU' =>
				array(
					'required' => false,
					'type' => 'SKUType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'StartPrice' =>
				array(
					'required' => false,
					'type' => 'AmountType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'Quantity' =>
				array(
					'required' => false,
					'type' => 'int',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'VariationSpecifics' =>
				array(
					'required' => false,
					'type' => 'NameValueListArrayType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'UnitsAvailable' =>
				array(
					'required' => false,
					'type' => 'int',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'UnitCost' =>
				array(
					'required' => false,
					'type' => 'AmountType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'SellingStatus' =>
				array(
					'required' => false,
					'type' => 'SellingStatusType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'VariationTitle' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'VariationViewItemURL' =>
				array(
					'required' => false,
					'type' => 'anyURI',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'Delete' =>
				array(
					'required' => false,
					'type' => 'boolean',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'SellingManagerProductInventoryStatus' =>
				array(
					'required' => false,
					'type' => 'SellingManagerProductInventoryStatusType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'WatchCount' =>
				array(
					'required' => false,
					'type' => 'long',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>

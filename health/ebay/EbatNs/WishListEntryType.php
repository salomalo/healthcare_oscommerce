<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'ExpressProductType.php';
require_once 'EbatNs_ComplexType.php';
require_once 'ItemType.php';

class WishListEntryType extends EbatNs_ComplexType
{
	// start props
	// @var ItemType $Item
	var $Item;
	// @var ExpressProductType $Product
	var $Product;
	// @var string $Notes
	var $Notes;
	// @var dateTime $CreationDate
	var $CreationDate;
	// @var int $QuantityWanted
	var $QuantityWanted;
	// @var int $QuantityReceived
	var $QuantityReceived;
	// end props

/**
 *

 * @return ItemType
 */
	function getItem()
	{
		return $this->Item;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setItem($value)
	{
		$this->Item = $value;
	}
/**
 *

 * @return ExpressProductType
 */
	function getProduct()
	{
		return $this->Product;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setProduct($value)
	{
		$this->Product = $value;
	}
/**
 *

 * @return string
 */
	function getNotes()
	{
		return $this->Notes;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setNotes($value)
	{
		$this->Notes = $value;
	}
/**
 *

 * @return dateTime
 */
	function getCreationDate()
	{
		return $this->CreationDate;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setCreationDate($value)
	{
		$this->CreationDate = $value;
	}
/**
 *

 * @return int
 */
	function getQuantityWanted()
	{
		return $this->QuantityWanted;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setQuantityWanted($value)
	{
		$this->QuantityWanted = $value;
	}
/**
 *

 * @return int
 */
	function getQuantityReceived()
	{
		return $this->QuantityReceived;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setQuantityReceived($value)
	{
		$this->QuantityReceived = $value;
	}
/**
 *

 * @return 
 */
	function WishListEntryType()
	{
		$this->EbatNs_ComplexType('WishListEntryType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'Item' =>
				array(
					'required' => false,
					'type' => 'ItemType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'Product' =>
				array(
					'required' => false,
					'type' => 'ExpressProductType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'Notes' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'CreationDate' =>
				array(
					'required' => false,
					'type' => 'dateTime',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'QuantityWanted' =>
				array(
					'required' => false,
					'type' => 'int',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'QuantityReceived' =>
				array(
					'required' => false,
					'type' => 'int',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>
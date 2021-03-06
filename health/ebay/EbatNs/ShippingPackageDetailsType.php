<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'ShippingPackageCodeType.php';
require_once 'EbatNs_ComplexType.php';

class ShippingPackageDetailsType extends EbatNs_ComplexType
{
	// start props
	// @var int $PackageID
	var $PackageID;
	// @var string $Description
	var $Description;
	// @var ShippingPackageCodeType $ShippingPackage
	var $ShippingPackage;
	// @var boolean $DefaultValue
	var $DefaultValue;
	// @var boolean $DimensionsSupported
	var $DimensionsSupported;
	// end props

/**
 *

 * @return int
 */
	function getPackageID()
	{
		return $this->PackageID;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setPackageID($value)
	{
		$this->PackageID = $value;
	}
/**
 *

 * @return string
 */
	function getDescription()
	{
		return $this->Description;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setDescription($value)
	{
		$this->Description = $value;
	}
/**
 *

 * @return ShippingPackageCodeType
 */
	function getShippingPackage()
	{
		return $this->ShippingPackage;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setShippingPackage($value)
	{
		$this->ShippingPackage = $value;
	}
/**
 *

 * @return boolean
 */
	function getDefaultValue()
	{
		return $this->DefaultValue;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setDefaultValue($value)
	{
		$this->DefaultValue = $value;
	}
/**
 *

 * @return boolean
 */
	function getDimensionsSupported()
	{
		return $this->DimensionsSupported;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setDimensionsSupported($value)
	{
		$this->DimensionsSupported = $value;
	}
/**
 *

 * @return 
 */
	function ShippingPackageDetailsType()
	{
		$this->EbatNs_ComplexType('ShippingPackageDetailsType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'PackageID' =>
				array(
					'required' => false,
					'type' => 'int',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'Description' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'ShippingPackage' =>
				array(
					'required' => false,
					'type' => 'ShippingPackageCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'DefaultValue' =>
				array(
					'required' => false,
					'type' => 'boolean',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'DimensionsSupported' =>
				array(
					'required' => false,
					'type' => 'boolean',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>

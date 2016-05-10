<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'StatusCodeType.php';
require_once 'EbatNs_ComplexType.php';

class RegionOfOriginDetailsType extends EbatNs_ComplexType
{
	// start props
	// @var string $RegionOfOrigin
	var $RegionOfOrigin;
	// @var string $Description
	var $Description;
	// @var StatusCodeType $Status
	var $Status;
	// end props

/**
 *

 * @return string
 */
	function getRegionOfOrigin()
	{
		return $this->RegionOfOrigin;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setRegionOfOrigin($value)
	{
		$this->RegionOfOrigin = $value;
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

 * @return StatusCodeType
 */
	function getStatus()
	{
		return $this->Status;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setStatus($value)
	{
		$this->Status = $value;
	}
/**
 *

 * @return 
 */
	function RegionOfOriginDetailsType()
	{
		$this->EbatNs_ComplexType('RegionOfOriginDetailsType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'RegionOfOrigin' =>
				array(
					'required' => false,
					'type' => 'string',
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
				'Status' =>
				array(
					'required' => false,
					'type' => 'StatusCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>
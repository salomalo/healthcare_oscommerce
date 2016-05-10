<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'DateSpecifierCodeType.php';
require_once 'EbatNs_ComplexType.php';
require_once 'ValType.php';
require_once 'RangeCodeType.php';

class SearchAttributesType extends EbatNs_ComplexType
{
	// start props
	// @var int $AttributeID
	var $AttributeID;
	// @var DateSpecifierCodeType $DateSpecifier
	var $DateSpecifier;
	// @var RangeCodeType $RangeSpecifier
	var $RangeSpecifier;
	// @var ValType $ValueList
	var $ValueList;
	// end props

/**
 *

 * @return int
 */
	function getAttributeID()
	{
		return $this->AttributeID;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setAttributeID($value)
	{
		$this->AttributeID = $value;
	}
/**
 *

 * @return DateSpecifierCodeType
 */
	function getDateSpecifier()
	{
		return $this->DateSpecifier;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setDateSpecifier($value)
	{
		$this->DateSpecifier = $value;
	}
/**
 *

 * @return RangeCodeType
 */
	function getRangeSpecifier()
	{
		return $this->RangeSpecifier;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setRangeSpecifier($value)
	{
		$this->RangeSpecifier = $value;
	}
/**
 *

 * @return ValType
 * @param  $index 
 */
	function getValueList($index = null)
	{
		if ($index) {
		return $this->ValueList[$index];
	} else {
		return $this->ValueList;
	}

	}
/**
 *

 * @return void
 * @param  $value 
 * @param  $index 
 */
	function setValueList($value, $index = null)
	{
		if ($index) {
	$this->ValueList[$index] = $value;
	} else {
	$this->ValueList = $value;
	}

	}
/**
 *

 * @return 
 */
	function SearchAttributesType()
	{
		$this->EbatNs_ComplexType('SearchAttributesType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'AttributeID' =>
				array(
					'required' => true,
					'type' => 'int',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '1..1'
				),
				'DateSpecifier' =>
				array(
					'required' => false,
					'type' => 'DateSpecifierCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'RangeSpecifier' =>
				array(
					'required' => false,
					'type' => 'RangeCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'ValueList' =>
				array(
					'required' => false,
					'type' => 'ValType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => true,
					'cardinality' => '0..*'
				)
			));

	}
}
?>
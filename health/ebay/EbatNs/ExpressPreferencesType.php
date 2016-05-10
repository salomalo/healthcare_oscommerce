<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'ExpressSellingPreferenceCodeType.php';
require_once 'EbatNs_ComplexType.php';

class ExpressPreferencesType extends EbatNs_ComplexType
{
	// start props
	// @var ExpressSellingPreferenceCodeType $ExpressSellingPreference
	var $ExpressSellingPreference;
	// @var string $DefaultPayPalAccount
	var $DefaultPayPalAccount;
	// end props

/**
 *

 * @return ExpressSellingPreferenceCodeType
 */
	function getExpressSellingPreference()
	{
		return $this->ExpressSellingPreference;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setExpressSellingPreference($value)
	{
		$this->ExpressSellingPreference = $value;
	}
/**
 *

 * @return string
 */
	function getDefaultPayPalAccount()
	{
		return $this->DefaultPayPalAccount;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setDefaultPayPalAccount($value)
	{
		$this->DefaultPayPalAccount = $value;
	}
/**
 *

 * @return 
 */
	function ExpressPreferencesType()
	{
		$this->EbatNs_ComplexType('ExpressPreferencesType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'ExpressSellingPreference' =>
				array(
					'required' => false,
					'type' => 'ExpressSellingPreferenceCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'DefaultPayPalAccount' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>
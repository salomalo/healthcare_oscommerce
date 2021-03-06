<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

class SellerFeeDiscountDashboardType extends EbatNs_ComplexType
{
	// start props
	// @var float $Percent
	var $Percent;
	// end props

/**
 *

 * @return float
 */
	function getPercent()
	{
		return $this->Percent;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setPercent($value)
	{
		$this->Percent = $value;
	}
/**
 *

 * @return 
 */
	function SellerFeeDiscountDashboardType()
	{
		$this->EbatNs_ComplexType('SellerFeeDiscountDashboardType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'Percent' =>
				array(
					'required' => false,
					'type' => 'float',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>

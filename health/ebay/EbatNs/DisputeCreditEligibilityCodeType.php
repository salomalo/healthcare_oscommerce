<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_FacetType.php';

class DisputeCreditEligibilityCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $InEligible
	var $InEligible = 'InEligible';
	// @var string $Eligible
	var $Eligible = 'Eligible';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// end props

/**
 *

 * @return 
 */
	function DisputeCreditEligibilityCodeType()
	{
		$this->EbatNs_FacetType('DisputeCreditEligibilityCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_DisputeCreditEligibilityCodeType = new DisputeCreditEligibilityCodeType();

?>

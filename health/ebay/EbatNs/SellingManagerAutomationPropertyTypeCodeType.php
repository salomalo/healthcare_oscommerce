<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_FacetType.php';

class SellingManagerAutomationPropertyTypeCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $ItemListFailedAutomationRules
	var $ItemListFailedAutomationRules = 'ItemListFailedAutomationRules';
	// @var string $ItemRelistFailedAutomationRules
	var $ItemRelistFailedAutomationRules = 'ItemRelistFailedAutomationRules';
	// @var string $ItemListFailedSecondChanceOfferAutoRules
	var $ItemListFailedSecondChanceOfferAutoRules = 'ItemListFailedSecondChanceOfferAutoRules';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// end props

/**
 *

 * @return 
 */
	function SellingManagerAutomationPropertyTypeCodeType()
	{
		$this->EbatNs_FacetType('SellingManagerAutomationPropertyTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_SellingManagerAutomationPropertyTypeCodeType = new SellingManagerAutomationPropertyTypeCodeType();

?>

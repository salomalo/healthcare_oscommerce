<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_FacetType.php';

class PromotionItemSelectionCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $Manual
	var $Manual = 'Manual';
	// @var string $Automatic
	var $Automatic = 'Automatic';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// end props

/**
 *

 * @return 
 */
	function PromotionItemSelectionCodeType()
	{
		$this->EbatNs_FacetType('PromotionItemSelectionCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_PromotionItemSelectionCodeType = new PromotionItemSelectionCodeType();

?>

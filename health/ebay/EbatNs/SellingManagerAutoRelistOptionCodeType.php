<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_FacetType.php';

class SellingManagerAutoRelistOptionCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $RelistImmediately
	var $RelistImmediately = 'RelistImmediately';
	// @var string $RelistAfterDaysHours
	var $RelistAfterDaysHours = 'RelistAfterDaysHours';
	// @var string $RelistAtSpecificTimeOfDay
	var $RelistAtSpecificTimeOfDay = 'RelistAtSpecificTimeOfDay';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// end props

/**
 *

 * @return 
 */
	function SellingManagerAutoRelistOptionCodeType()
	{
		$this->EbatNs_FacetType('SellingManagerAutoRelistOptionCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_SellingManagerAutoRelistOptionCodeType = new SellingManagerAutoRelistOptionCodeType();

?>
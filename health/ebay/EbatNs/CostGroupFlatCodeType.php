<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_FacetType.php';

class CostGroupFlatCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $Group1MaxFlatShippingCost
	var $Group1MaxFlatShippingCost = 'Group1MaxFlatShippingCost';
	// @var string $Group2MaxFlatShippingCost
	var $Group2MaxFlatShippingCost = 'Group2MaxFlatShippingCost';
	// @var string $Group3MaxFlatShippingCost
	var $Group3MaxFlatShippingCost = 'Group3MaxFlatShippingCost';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// end props

/**
 *

 * @return 
 */
	function CostGroupFlatCodeType()
	{
		$this->EbatNs_FacetType('CostGroupFlatCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_CostGroupFlatCodeType = new CostGroupFlatCodeType();

?>

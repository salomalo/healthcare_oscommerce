<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_FacetType.php';

class InventoryTrackingMethodCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $ItemID
	var $ItemID = 'ItemID';
	// @var string $SKU
	var $SKU = 'SKU';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// end props

/**
 *

 * @return 
 */
	function InventoryTrackingMethodCodeType()
	{
		$this->EbatNs_FacetType('InventoryTrackingMethodCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_InventoryTrackingMethodCodeType = new InventoryTrackingMethodCodeType();

?>
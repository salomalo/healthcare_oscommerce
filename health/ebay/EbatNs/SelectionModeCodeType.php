<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_FacetType.php';

class SelectionModeCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $Automatic
	var $Automatic = 'Automatic';
	// @var string $Manual
	var $Manual = 'Manual';
	// @var string $Prefilled
	var $Prefilled = 'Prefilled';
	// @var string $SelectionOnly
	var $SelectionOnly = 'SelectionOnly';
	// @var string $FreeText
	var $FreeText = 'FreeText';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// end props

/**
 *

 * @return 
 */
	function SelectionModeCodeType()
	{
		$this->EbatNs_FacetType('SelectionModeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_SelectionModeCodeType = new SelectionModeCodeType();

?>
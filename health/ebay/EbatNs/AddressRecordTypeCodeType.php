<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_FacetType.php';

class AddressRecordTypeCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $Residential
	var $Residential = 'Residential';
	// @var string $Business
	var $Business = 'Business';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// end props

/**
 *

 * @return 
 */
	function AddressRecordTypeCodeType()
	{
		$this->EbatNs_FacetType('AddressRecordTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_AddressRecordTypeCodeType = new AddressRecordTypeCodeType();

?>
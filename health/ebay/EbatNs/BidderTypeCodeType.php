<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_FacetType.php';

class BidderTypeCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $AllBidder
	var $AllBidder = 'AllBidder';
	// @var string $HighBidder
	var $HighBidder = 'HighBidder';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// end props

/**
 *

 * @return 
 */
	function BidderTypeCodeType()
	{
		$this->EbatNs_FacetType('BidderTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_BidderTypeCodeType = new BidderTypeCodeType();

?>
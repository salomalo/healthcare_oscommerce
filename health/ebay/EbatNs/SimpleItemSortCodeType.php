<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_FacetType.php';

class SimpleItemSortCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $BestMatch
	var $BestMatch = 'BestMatch';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// @var string $EndTime
	var $EndTime = 'EndTime';
	// @var string $BidCount
	var $BidCount = 'BidCount';
	// @var string $Country
	var $Country = 'Country';
	// @var string $CurrentBid
	var $CurrentBid = 'CurrentBid';
	// @var string $Distance
	var $Distance = 'Distance';
	// @var string $StartDate
	var $StartDate = 'StartDate';
	// @var string $BestMatchCategoryGroup
	var $BestMatchCategoryGroup = 'BestMatchCategoryGroup';
	// @var string $PricePlusShipping
	var $PricePlusShipping = 'PricePlusShipping';
	// end props

/**
 *

 * @return 
 */
	function SimpleItemSortCodeType()
	{
		$this->EbatNs_FacetType('SimpleItemSortCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_SimpleItemSortCodeType = new SimpleItemSortCodeType();

?>
<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'SellingStatusType.php';
require_once 'AbstractResponseType.php';
require_once 'BestOfferType.php';

class PlaceOfferResponseType extends AbstractResponseType
{
	// start props
	// @var SellingStatusType $SellingStatus
	var $SellingStatus;
	// @var string $TransactionID
	var $TransactionID;
	// @var BestOfferType $BestOffer
	var $BestOffer;
	// end props

/**
 *

 * @return SellingStatusType
 */
	function getSellingStatus()
	{
		return $this->SellingStatus;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setSellingStatus($value)
	{
		$this->SellingStatus = $value;
	}
/**
 *

 * @return string
 */
	function getTransactionID()
	{
		return $this->TransactionID;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setTransactionID($value)
	{
		$this->TransactionID = $value;
	}
/**
 *

 * @return BestOfferType
 */
	function getBestOffer()
	{
		return $this->BestOffer;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setBestOffer($value)
	{
		$this->BestOffer = $value;
	}
/**
 *

 * @return 
 */
	function PlaceOfferResponseType()
	{
		$this->AbstractResponseType('PlaceOfferResponseType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'SellingStatus' =>
				array(
					'required' => false,
					'type' => 'SellingStatusType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'TransactionID' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'BestOffer' =>
				array(
					'required' => false,
					'type' => 'BestOfferType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>
<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'FeedbackSummaryPeriodCodeType.php';
require_once 'AverageRatingDetailsType.php';

class AverageRatingSummaryType extends EbatNs_ComplexType
{
	// start props
	// @var FeedbackSummaryPeriodCodeType $FeedbackSummaryPeriod
	var $FeedbackSummaryPeriod;
	// @var AverageRatingDetailsType $AverageRatingDetails
	var $AverageRatingDetails;
	// end props

/**
 *

 * @return FeedbackSummaryPeriodCodeType
 */
	function getFeedbackSummaryPeriod()
	{
		return $this->FeedbackSummaryPeriod;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setFeedbackSummaryPeriod($value)
	{
		$this->FeedbackSummaryPeriod = $value;
	}
/**
 *

 * @return AverageRatingDetailsType
 * @param  $index 
 */
	function getAverageRatingDetails($index = null)
	{
		if ($index) {
		return $this->AverageRatingDetails[$index];
	} else {
		return $this->AverageRatingDetails;
	}

	}
/**
 *

 * @return void
 * @param  $value 
 * @param  $index 
 */
	function setAverageRatingDetails($value, $index = null)
	{
		if ($index) {
	$this->AverageRatingDetails[$index] = $value;
	} else {
	$this->AverageRatingDetails = $value;
	}

	}
/**
 *

 * @return 
 */
	function AverageRatingSummaryType()
	{
		$this->EbatNs_ComplexType('AverageRatingSummaryType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'FeedbackSummaryPeriod' =>
				array(
					'required' => false,
					'type' => 'FeedbackSummaryPeriodCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'AverageRatingDetails' =>
				array(
					'required' => false,
					'type' => 'AverageRatingDetailsType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => true,
					'cardinality' => '0..*'
				)
			));

	}
}
?>

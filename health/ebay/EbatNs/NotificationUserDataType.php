<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'SummaryEventScheduleType.php';
require_once 'SMSSubscriptionType.php';
require_once 'EbatNs_ComplexType.php';

class NotificationUserDataType extends EbatNs_ComplexType
{
	// start props
	// @var SMSSubscriptionType $SMSSubscription
	var $SMSSubscription;
	// @var SummaryEventScheduleType $SummarySchedule
	var $SummarySchedule;
	// @var string $ExternalUserData
	var $ExternalUserData;
	// end props

/**
 *

 * @return SMSSubscriptionType
 */
	function getSMSSubscription()
	{
		return $this->SMSSubscription;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setSMSSubscription($value)
	{
		$this->SMSSubscription = $value;
	}
/**
 *

 * @return SummaryEventScheduleType
 * @param  $index 
 */
	function getSummarySchedule($index = null)
	{
		if ($index) {
		return $this->SummarySchedule[$index];
	} else {
		return $this->SummarySchedule;
	}

	}
/**
 *

 * @return void
 * @param  $value 
 * @param  $index 
 */
	function setSummarySchedule($value, $index = null)
	{
		if ($index) {
	$this->SummarySchedule[$index] = $value;
	} else {
	$this->SummarySchedule = $value;
	}

	}
/**
 *

 * @return string
 */
	function getExternalUserData()
	{
		return $this->ExternalUserData;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setExternalUserData($value)
	{
		$this->ExternalUserData = $value;
	}
/**
 *

 * @return 
 */
	function NotificationUserDataType()
	{
		$this->EbatNs_ComplexType('NotificationUserDataType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'SMSSubscription' =>
				array(
					'required' => false,
					'type' => 'SMSSubscriptionType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'SummarySchedule' =>
				array(
					'required' => false,
					'type' => 'SummaryEventScheduleType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => true,
					'cardinality' => '0..*'
				),
				'ExternalUserData' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>
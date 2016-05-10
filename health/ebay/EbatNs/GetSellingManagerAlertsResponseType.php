<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'SellingManagerAlertType.php';
require_once 'AbstractResponseType.php';

class GetSellingManagerAlertsResponseType extends AbstractResponseType
{
	// start props
	// @var SellingManagerAlertType $Alert
	var $Alert;
	// end props

/**
 *

 * @return SellingManagerAlertType
 * @param  $index 
 */
	function getAlert($index = null)
	{
		if ($index) {
		return $this->Alert[$index];
	} else {
		return $this->Alert;
	}

	}
/**
 *

 * @return void
 * @param  $value 
 * @param  $index 
 */
	function setAlert($value, $index = null)
	{
		if ($index) {
	$this->Alert[$index] = $value;
	} else {
	$this->Alert = $value;
	}

	}
/**
 *

 * @return 
 */
	function GetSellingManagerAlertsResponseType()
	{
		$this->AbstractResponseType('GetSellingManagerAlertsResponseType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'Alert' =>
				array(
					'required' => false,
					'type' => 'SellingManagerAlertType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => true,
					'cardinality' => '0..*'
				)
			));

	}
}
?>
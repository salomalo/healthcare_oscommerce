<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'AbstractResponseType.php';

class GetClientAlertsAuthTokenResponseType extends AbstractResponseType
{
	// start props
	// @var string $ClientAlertsAuthToken
	var $ClientAlertsAuthToken;
	// @var dateTime $HardExpirationTime
	var $HardExpirationTime;
	// end props

/**
 *

 * @return string
 */
	function getClientAlertsAuthToken()
	{
		return $this->ClientAlertsAuthToken;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setClientAlertsAuthToken($value)
	{
		$this->ClientAlertsAuthToken = $value;
	}
/**
 *

 * @return dateTime
 */
	function getHardExpirationTime()
	{
		return $this->HardExpirationTime;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setHardExpirationTime($value)
	{
		$this->HardExpirationTime = $value;
	}
/**
 *

 * @return 
 */
	function GetClientAlertsAuthTokenResponseType()
	{
		$this->AbstractResponseType('GetClientAlertsAuthTokenResponseType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'ClientAlertsAuthToken' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'HardExpirationTime' =>
				array(
					'required' => false,
					'type' => 'dateTime',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>
<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'AbstractResponseType.php';

class FetchTokenResponseType extends AbstractResponseType
{
	// start props
	// @var string $eBayAuthToken
	var $eBayAuthToken;
	// @var dateTime $HardExpirationTime
	var $HardExpirationTime;
	// @var string $RESTToken
	var $RESTToken;
	// end props

/**
 *

 * @return string
 */
	function getEBayAuthToken()
	{
		return $this->eBayAuthToken;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setEBayAuthToken($value)
	{
		$this->eBayAuthToken = $value;
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

 * @return string
 */
	function getRESTToken()
	{
		return $this->RESTToken;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setRESTToken($value)
	{
		$this->RESTToken = $value;
	}
/**
 *

 * @return 
 */
	function FetchTokenResponseType()
	{
		$this->AbstractResponseType('FetchTokenResponseType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'eBayAuthToken' =>
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
				),
				'RESTToken' =>
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
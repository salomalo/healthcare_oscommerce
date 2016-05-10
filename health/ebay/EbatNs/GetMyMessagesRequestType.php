<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'MyMessagesAlertIDArrayType.php';
require_once 'MyMessagesExternalMessageIDArrayType.php';
require_once 'MyMessagesMessageIDArrayType.php';
require_once 'AbstractRequestType.php';

class GetMyMessagesRequestType extends AbstractRequestType
{
	// start props
	// @var MyMessagesAlertIDArrayType $AlertIDs
	var $AlertIDs;
	// @var MyMessagesMessageIDArrayType $MessageIDs
	var $MessageIDs;
	// @var long $FolderID
	var $FolderID;
	// @var dateTime $StartTime
	var $StartTime;
	// @var dateTime $EndTime
	var $EndTime;
	// @var MyMessagesExternalMessageIDArrayType $ExternalMessageIDs
	var $ExternalMessageIDs;
	// end props

/**
 *

 * @return MyMessagesAlertIDArrayType
 */
	function getAlertIDs()
	{
		return $this->AlertIDs;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setAlertIDs($value)
	{
		$this->AlertIDs = $value;
	}
/**
 *

 * @return MyMessagesMessageIDArrayType
 */
	function getMessageIDs()
	{
		return $this->MessageIDs;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setMessageIDs($value)
	{
		$this->MessageIDs = $value;
	}
/**
 *

 * @return long
 */
	function getFolderID()
	{
		return $this->FolderID;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setFolderID($value)
	{
		$this->FolderID = $value;
	}
/**
 *

 * @return dateTime
 */
	function getStartTime()
	{
		return $this->StartTime;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setStartTime($value)
	{
		$this->StartTime = $value;
	}
/**
 *

 * @return dateTime
 */
	function getEndTime()
	{
		return $this->EndTime;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setEndTime($value)
	{
		$this->EndTime = $value;
	}
/**
 *

 * @return MyMessagesExternalMessageIDArrayType
 */
	function getExternalMessageIDs()
	{
		return $this->ExternalMessageIDs;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setExternalMessageIDs($value)
	{
		$this->ExternalMessageIDs = $value;
	}
/**
 *

 * @return 
 */
	function GetMyMessagesRequestType()
	{
		$this->AbstractRequestType('GetMyMessagesRequestType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'AlertIDs' =>
				array(
					'required' => false,
					'type' => 'MyMessagesAlertIDArrayType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'MessageIDs' =>
				array(
					'required' => false,
					'type' => 'MyMessagesMessageIDArrayType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'FolderID' =>
				array(
					'required' => false,
					'type' => 'long',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'StartTime' =>
				array(
					'required' => false,
					'type' => 'dateTime',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'EndTime' =>
				array(
					'required' => false,
					'type' => 'dateTime',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'ExternalMessageIDs' =>
				array(
					'required' => false,
					'type' => 'MyMessagesExternalMessageIDArrayType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>
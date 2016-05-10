<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'MessageStatusTypeCodeType.php';
require_once 'AbstractRequestType.php';
require_once 'ItemIDType.php';

class GetAdFormatLeadsRequestType extends AbstractRequestType
{
	// start props
	// @var ItemIDType $ItemID
	var $ItemID;
	// @var MessageStatusTypeCodeType $Status
	var $Status;
	// @var boolean $IncludeMemberMessages
	var $IncludeMemberMessages;
	// @var dateTime $StartCreationTime
	var $StartCreationTime;
	// @var dateTime $EndCreationTime
	var $EndCreationTime;
	// end props

/**
 *

 * @return ItemIDType
 */
	function getItemID()
	{
		return $this->ItemID;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setItemID($value)
	{
		$this->ItemID = $value;
	}
/**
 *

 * @return MessageStatusTypeCodeType
 */
	function getStatus()
	{
		return $this->Status;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setStatus($value)
	{
		$this->Status = $value;
	}
/**
 *

 * @return boolean
 */
	function getIncludeMemberMessages()
	{
		return $this->IncludeMemberMessages;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setIncludeMemberMessages($value)
	{
		$this->IncludeMemberMessages = $value;
	}
/**
 *

 * @return dateTime
 */
	function getStartCreationTime()
	{
		return $this->StartCreationTime;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setStartCreationTime($value)
	{
		$this->StartCreationTime = $value;
	}
/**
 *

 * @return dateTime
 */
	function getEndCreationTime()
	{
		return $this->EndCreationTime;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setEndCreationTime($value)
	{
		$this->EndCreationTime = $value;
	}
/**
 *

 * @return 
 */
	function GetAdFormatLeadsRequestType()
	{
		$this->AbstractRequestType('GetAdFormatLeadsRequestType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'ItemID' =>
				array(
					'required' => false,
					'type' => 'ItemIDType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'Status' =>
				array(
					'required' => false,
					'type' => 'MessageStatusTypeCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'IncludeMemberMessages' =>
				array(
					'required' => false,
					'type' => 'boolean',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'StartCreationTime' =>
				array(
					'required' => false,
					'type' => 'dateTime',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'EndCreationTime' =>
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
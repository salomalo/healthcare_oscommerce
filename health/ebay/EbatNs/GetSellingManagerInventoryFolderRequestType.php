<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'AbstractRequestType.php';

class GetSellingManagerInventoryFolderRequestType extends AbstractRequestType
{
	// start props
	// @var long $FolderID
	var $FolderID;
	// @var int $MaxDepth
	var $MaxDepth;
	// @var boolean $FullRecursion
	var $FullRecursion;
	// end props

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

 * @return int
 */
	function getMaxDepth()
	{
		return $this->MaxDepth;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setMaxDepth($value)
	{
		$this->MaxDepth = $value;
	}
/**
 *

 * @return boolean
 */
	function getFullRecursion()
	{
		return $this->FullRecursion;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setFullRecursion($value)
	{
		$this->FullRecursion = $value;
	}
/**
 *

 * @return 
 */
	function GetSellingManagerInventoryFolderRequestType()
	{
		$this->AbstractRequestType('GetSellingManagerInventoryFolderRequestType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'FolderID' =>
				array(
					'required' => false,
					'type' => 'long',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'MaxDepth' =>
				array(
					'required' => false,
					'type' => 'int',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'FullRecursion' =>
				array(
					'required' => false,
					'type' => 'boolean',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>
<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'AbstractRequestType.php';

class GetSuggestedCategoriesRequestType extends AbstractRequestType
{
	// start props
	// @var string $Query
	var $Query;
	// end props

/**
 *

 * @return string
 */
	function getQuery()
	{
		return $this->Query;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setQuery($value)
	{
		$this->Query = $value;
	}
/**
 *

 * @return 
 */
	function GetSuggestedCategoriesRequestType()
	{
		$this->AbstractRequestType('GetSuggestedCategoriesRequestType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'Query' =>
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
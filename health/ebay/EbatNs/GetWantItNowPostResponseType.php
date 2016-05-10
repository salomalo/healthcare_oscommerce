<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'WantItNowPostType.php';
require_once 'AbstractResponseType.php';

class GetWantItNowPostResponseType extends AbstractResponseType
{
	// start props
	// @var WantItNowPostType $WantItNowPost
	var $WantItNowPost;
	// end props

/**
 *

 * @return WantItNowPostType
 */
	function getWantItNowPost()
	{
		return $this->WantItNowPost;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setWantItNowPost($value)
	{
		$this->WantItNowPost = $value;
	}
/**
 *

 * @return 
 */
	function GetWantItNowPostResponseType()
	{
		$this->AbstractResponseType('GetWantItNowPostResponseType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'WantItNowPost' =>
				array(
					'required' => false,
					'type' => 'WantItNowPostType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>
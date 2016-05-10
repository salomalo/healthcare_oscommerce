<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'NumberOfPolicyViolationsDetailsType.php';
require_once 'EbatNs_ComplexType.php';
require_once 'PolicyViolationDurationDetailsType.php';

class MaximumBuyerPolicyViolationsDetailsType extends EbatNs_ComplexType
{
	// start props
	// @var NumberOfPolicyViolationsDetailsType $NumberOfPolicyViolations
	var $NumberOfPolicyViolations;
	// @var PolicyViolationDurationDetailsType $PolicyViolationDuration
	var $PolicyViolationDuration;
	// end props

/**
 *

 * @return NumberOfPolicyViolationsDetailsType
 */
	function getNumberOfPolicyViolations()
	{
		return $this->NumberOfPolicyViolations;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setNumberOfPolicyViolations($value)
	{
		$this->NumberOfPolicyViolations = $value;
	}
/**
 *

 * @return PolicyViolationDurationDetailsType
 * @param  $index 
 */
	function getPolicyViolationDuration($index = null)
	{
		if ($index) {
		return $this->PolicyViolationDuration[$index];
	} else {
		return $this->PolicyViolationDuration;
	}

	}
/**
 *

 * @return void
 * @param  $value 
 * @param  $index 
 */
	function setPolicyViolationDuration($value, $index = null)
	{
		if ($index) {
	$this->PolicyViolationDuration[$index] = $value;
	} else {
	$this->PolicyViolationDuration = $value;
	}

	}
/**
 *

 * @return 
 */
	function MaximumBuyerPolicyViolationsDetailsType()
	{
		$this->EbatNs_ComplexType('MaximumBuyerPolicyViolationsDetailsType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'NumberOfPolicyViolations' =>
				array(
					'required' => false,
					'type' => 'NumberOfPolicyViolationsDetailsType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'PolicyViolationDuration' =>
				array(
					'required' => false,
					'type' => 'PolicyViolationDurationDetailsType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => true,
					'cardinality' => '0..*'
				)
			));

	}
}
?>
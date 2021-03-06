<?php
// autogenerated file 29.05.2009 15:17
// $Id: $
// $Log: $
//
//
require_once 'PaymentStatusCodeType.php';
require_once 'CompleteStatusCodeType.php';
require_once 'EbatNs_ComplexType.php';
require_once 'BuyerPaymentMethodCodeType.php';

class CheckoutStatusType extends EbatNs_ComplexType
{
	// start props
	// @var PaymentStatusCodeType $eBayPaymentStatus
	var $eBayPaymentStatus;
	// @var dateTime $LastModifiedTime
	var $LastModifiedTime;
	// @var BuyerPaymentMethodCodeType $PaymentMethod
	var $PaymentMethod;
	// @var CompleteStatusCodeType $Status
	var $Status;
	// @var boolean $IntegratedMerchantCreditCardEnabled
	var $IntegratedMerchantCreditCardEnabled;
	// end props

/**
 *

 * @return PaymentStatusCodeType
 */
	function getEBayPaymentStatus()
	{
		return $this->eBayPaymentStatus;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setEBayPaymentStatus($value)
	{
		$this->eBayPaymentStatus = $value;
	}
/**
 *

 * @return dateTime
 */
	function getLastModifiedTime()
	{
		return $this->LastModifiedTime;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setLastModifiedTime($value)
	{
		$this->LastModifiedTime = $value;
	}
/**
 *

 * @return BuyerPaymentMethodCodeType
 */
	function getPaymentMethod()
	{
		return $this->PaymentMethod;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setPaymentMethod($value)
	{
		$this->PaymentMethod = $value;
	}
/**
 *

 * @return CompleteStatusCodeType
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
	function getIntegratedMerchantCreditCardEnabled()
	{
		return $this->IntegratedMerchantCreditCardEnabled;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setIntegratedMerchantCreditCardEnabled($value)
	{
		$this->IntegratedMerchantCreditCardEnabled = $value;
	}
/**
 *

 * @return 
 */
	function CheckoutStatusType()
	{
		$this->EbatNs_ComplexType('CheckoutStatusType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'eBayPaymentStatus' =>
				array(
					'required' => false,
					'type' => 'PaymentStatusCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'LastModifiedTime' =>
				array(
					'required' => false,
					'type' => 'dateTime',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'PaymentMethod' =>
				array(
					'required' => false,
					'type' => 'BuyerPaymentMethodCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'Status' =>
				array(
					'required' => false,
					'type' => 'CompleteStatusCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'IntegratedMerchantCreditCardEnabled' =>
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

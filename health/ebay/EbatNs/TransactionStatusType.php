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
require_once 'CheckoutStatusCodeType.php';
require_once 'PaymentHoldStatusCodeType.php';

class TransactionStatusType extends EbatNs_ComplexType
{
	// start props
	// @var PaymentStatusCodeType $eBayPaymentStatus
	var $eBayPaymentStatus;
	// @var CheckoutStatusCodeType $CheckoutStatus
	var $CheckoutStatus;
	// @var dateTime $LastTimeModified
	var $LastTimeModified;
	// @var BuyerPaymentMethodCodeType $PaymentMethodUsed
	var $PaymentMethodUsed;
	// @var CompleteStatusCodeType $CompleteStatus
	var $CompleteStatus;
	// @var boolean $BuyerSelectedShipping
	var $BuyerSelectedShipping;
	// @var PaymentHoldStatusCodeType $PaymentHoldStatus
	var $PaymentHoldStatus;
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

 * @return CheckoutStatusCodeType
 */
	function getCheckoutStatus()
	{
		return $this->CheckoutStatus;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setCheckoutStatus($value)
	{
		$this->CheckoutStatus = $value;
	}
/**
 *

 * @return dateTime
 */
	function getLastTimeModified()
	{
		return $this->LastTimeModified;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setLastTimeModified($value)
	{
		$this->LastTimeModified = $value;
	}
/**
 *

 * @return BuyerPaymentMethodCodeType
 */
	function getPaymentMethodUsed()
	{
		return $this->PaymentMethodUsed;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setPaymentMethodUsed($value)
	{
		$this->PaymentMethodUsed = $value;
	}
/**
 *

 * @return CompleteStatusCodeType
 */
	function getCompleteStatus()
	{
		return $this->CompleteStatus;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setCompleteStatus($value)
	{
		$this->CompleteStatus = $value;
	}
/**
 *

 * @return boolean
 */
	function getBuyerSelectedShipping()
	{
		return $this->BuyerSelectedShipping;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setBuyerSelectedShipping($value)
	{
		$this->BuyerSelectedShipping = $value;
	}
/**
 *

 * @return PaymentHoldStatusCodeType
 */
	function getPaymentHoldStatus()
	{
		return $this->PaymentHoldStatus;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setPaymentHoldStatus($value)
	{
		$this->PaymentHoldStatus = $value;
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
	function TransactionStatusType()
	{
		$this->EbatNs_ComplexType('TransactionStatusType', 'urn:ebay:apis:eBLBaseComponents');
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
				'CheckoutStatus' =>
				array(
					'required' => false,
					'type' => 'CheckoutStatusCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'LastTimeModified' =>
				array(
					'required' => false,
					'type' => 'dateTime',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'PaymentMethodUsed' =>
				array(
					'required' => false,
					'type' => 'BuyerPaymentMethodCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'CompleteStatus' =>
				array(
					'required' => false,
					'type' => 'CompleteStatusCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'BuyerSelectedShipping' =>
				array(
					'required' => false,
					'type' => 'boolean',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'PaymentHoldStatus' =>
				array(
					'required' => false,
					'type' => 'PaymentHoldStatusCodeType',
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
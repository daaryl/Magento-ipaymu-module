<?php
/**
 * Magento
 *
 * @author    WakaMage http://www.wakamage.com <cs@wakamage.com>
 * @copyright Copyright (C) 2013 WakaMage. (http://www.wakamage.com)
 *
 */
 
class WakaMage_IpayMu_Model_Standard extends Mage_Payment_Model_Method_Abstract {
	protected $_code = 'ipaymu';
	
	protected $_isInitializeNeeded      = true;
	protected $_canUseInternal          = true;
	protected $_canUseForMultishipping  = false;
	
	protected $_formBlockType = 'ipaymu/payment_form_ipaymu';
	
	public function getOrderPlaceRedirectUrl() {
		
		$allowedCurrencies = Mage::getModel('directory/currency')->getConfigAllowCurrencies(); 
		
		if (in_array('IDR', $allowedCurrencies)){
			return Mage::getUrl('ipaymu/payment/sending', array('_secure' => true));
		}
		if (!in_array('IDR', $allowedCurrencies)){
			return Mage::getUrl('ipaymu/payment/noidr');
		}

	}
}
<?php
/**
 * Magento
 *
 * @author    WakaMage http://www.wakamage.com <cs@wakamage.com>
 * @copyright Copyright (C) 2013 WakaMage. (http://www.wakamage.com)
 *
 */
 
class WakaMage_IpayMu_Helper_Data extends Mage_Core_Helper_Abstract {
	
	//Get total price
	public function getTotalPrice() {
		$session = Mage::getSingleton('checkout/session')->getLastRealOrderId();
		$order = Mage::getModel('sales/order')->loadByIncrementId($session);
		$baseCode = Mage::app()->getBaseCurrencyCode();      
		$allowedCurrencies = Mage::getModel('directory/currency')->getConfigAllowCurrencies(); 
		$rates = Mage::getModel('directory/currency')->getCurrencyRates($baseCode, array_values($allowedCurrencies));
		$totalPrice = $order->getBaseGrandTotal()*$rates['IDR'];
		return $totalPrice;
	}
	
	//Get ordered product names and Qty
	public function getProducts() {
		$session = Mage::getSingleton('checkout/session')->getLastRealOrderId();
		$order = Mage::getModel('sales/order')->loadByIncrementId($session);
		$items = $order->getAllVisibleItems();

		$products = "";
	 
		foreach ($items as $item) {
			//$output .= $item->getSku() . "<br>";
			$products .= $item->getName() . " ";
			//$output .= $item->getDescription() . "<br>";
			$products .= "Qty: ".$item->getQtyToInvoice();
			//$output .= $item->getBaseCalculationPrice();
			$products .= ", ";
		}
		
		return $products;
	}
	
	public function getUserName() {
        if (!Mage::getSingleton('customer/session')->isLoggedIn()) {
            return '';
        }
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        return trim($customer->getName());
    }

    public function getUserEmail()
    {
        if (!Mage::getSingleton('customer/session')->isLoggedIn()) {
            return '';
        }
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        return $customer->getEmail();
    }

}
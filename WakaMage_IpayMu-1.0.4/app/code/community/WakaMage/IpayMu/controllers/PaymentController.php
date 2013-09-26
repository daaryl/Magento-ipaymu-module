<?php
/**
 * Magento
 *
 * @author    WakaMage http://www.wakamage.com <cs@wakamage.com>
 * @copyright Copyright (C) 2013 WakaMage. (http://www.wakamage.com)
 *
 */

class WakaMage_IpayMu_PaymentController extends Mage_Core_Controller_Front_Action {
	// The redirect action is triggered when someone places an order
	
	public function redirectAction() {
		$this->getResponse()->setBody($this->getLayout()->createBlock('ipaymu/payment_redirect'));
	}

	public function sendingAction() {
		$this->getResponse()->setBody($this->getLayout()->createBlock('ipaymu/sending')->toHtml());
	}
	
	public function noidrAction() {
		$this->loadLayout();
		$this->renderLayout();
	}
	
	public function notifyAction() {
	}
	
	// The response action is triggered when ipaymu sends back a response after processing the customer's payment
	public function responseAction() {
		$orderId = Mage::getSingleton('checkout/session')->getLastRealOrderId();
		$order = Mage::getModel('sales/order');
		$order->loadByIncrementId($orderId);
		$order->setState(Mage_Sales_Model_Order::STATE_PROCESSING, true, 'IPAYMU has processed the payment.');
				
		$order->sendNewOrderEmail();
		$order->setEmailSent(true);
				
		$order->save();
			
		Mage::getSingleton('checkout/session')->unsQuoteId();
				
		Mage_Core_Controller_Varien_Action::_redirect('checkout/onepage/success', array('_secure'=>true));
	}
	
	// The cancel action is triggered when an order is to be cancelled
	public function cancelAction() {
        if (Mage::getSingleton('checkout/session')->getLastRealOrderId()) {
            $order = Mage::getModel('sales/order')->loadByIncrementId(Mage::getSingleton('checkout/session')->getLastRealOrderId());
            if($order->getId()) {
				// Flag the order as 'cancelled' and save it
				$order->cancel()->setState(Mage_Sales_Model_Order::STATE_CANCELED, true, 'IPAYMU has declined the payment.')->save();
			}
        }
	}
}
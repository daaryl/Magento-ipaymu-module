<?php
/**
 * Magento
 *
 * @author    WakaMage http://www.wakamage.com <cs@wakamage.com>
 * @copyright Copyright (C) 2013 WakaMage. (http://www.wakamage.com)
 *
 */

class WakaMage_IpayMu_WhatisipaymuController extends Mage_Core_Controller_Front_Action {
	public function indexAction() {
		$this->getResponse()->setBody($this->getLayout()->createBlock('ipaymu/whatisipaymu')->toHtml());
	}
}
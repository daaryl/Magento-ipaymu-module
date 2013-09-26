<?php
/**
 * Magento
 *
 * @author    WakaMage http://www.wakamage.com <cs@wakamage.com>
 * @copyright Copyright (C) 2013 WakaMage. (http://www.wakamage.com)
 *
 */
class WakaMage_IpayMu_Block_Payment_Form_Ipaymu extends Mage_Payment_Block_Form
{
    /**
     * Set template and redirect message
     */
    protected function _construct()
    {
		$mark = Mage::getConfig()->getBlockClassName('core/template');
        $mark = new $mark;
        $mark->setTemplate('ipaymu/payment/form/ipaymu.phtml');
		
		$this->setTemplate('ipaymu/payment/redirect.phtml')
            ->setRedirectMessage(
                Mage::helper('ipaymu')->__('<p>Anda akan diarahkan ke website iPayMu setelah klik Place Order.</p><p>Jika Anda bukan member IPAYMU, Anda tetap bisa melakukan pembayaran dengan IPAYMU dengan cara memilih “Pembayaran Lain (Non Member IPAYMU)” pada halaman pembayaran di website IPAYMU. Setelah itu Anda mendapatkan email dari IPAYMU yang berisi instruksi untuk transfer total biaya ke rekening unik IPAYMU.</p>')
            )
            ->setMethodTitle('') // Output iPayMu mark, omit title
			->setMethodLabelAfterHtml($mark->toHtml());
		
			return parent::_construct();    
	}
}

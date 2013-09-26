<?php 
/**
 * Magento
 *
 * @author    WakaMage http://www.wakamage.com <cs@wakamage.com>
 * @copyright Copyright (C) 2013 WakaMage. (http://www.wakamage.com)
 *
 */
class WakaMage_IpayMu_Block_Sending extends Mage_Core_Block_Abstract
{
    protected function _toHtml()
    {
        $form = new Varien_Data_Form();
        $form->setAction(Mage::getBaseUrl().'ipaymu/payment/redirect')
            ->setId('ipaymuredirect')
            ->setName('ipaymuredirect')
            ->setMethod('POST')
            ->setUseContainer(true);
        $submitButton = new Varien_Data_Form_Element_Submit(array(
            'value'    => $this->__('Klik disini jika dalam 5 detik belum diarahkan ke website IPAYMU'),
        ));
        $form->addElement($submitButton);
        $html = '<html><body>';
        $html.= $this->__('<p>Sekarang Anda akan diarahkan ke website IPAYMU untuk melakukan pembayaran.</p>');
        $html.= $form->toHtml();
        $html.= '<script type="text/javascript">document.getElementById("ipaymuredirect").submit();</script>';
        $html.= '</body></html>';

        return $html;
    }
}
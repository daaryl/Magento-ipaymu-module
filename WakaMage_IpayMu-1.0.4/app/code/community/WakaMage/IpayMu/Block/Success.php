<?php 
/**
 * Magento
 *
 * @author    WakaMage http://www.wakamage.com <cs@wakamage.com>
 * @copyright Copyright (C) 2013 WakaMage. (http://www.wakamage.com)
 *
 */
class WakaMage_IpayMu_Block_Success extends Mage_Core_Block_Abstract
{
    protected function _toHtml()
    {
        echo '<p>Silahkan cek email, jika tidak ada, cek folder junk/spam, jika tidak ada juga, silahkan <a href="'.Mage::getBaseUrl().'contacts" target="_blank">hubungi kami</a>. Jika Anda memilih pembayaran non member IPAYMU, instruksi transfer telah dikirim ke email oleh IPAYMU.</p>';
		echo '<p>Bila telah melakukan pembayaran, silahkan melakukan <a href="'.Mage::getBaseUrl().'ipaymu/billing" target="_blank">konfirmasi pembayaran</a>.</p>';
    }
}

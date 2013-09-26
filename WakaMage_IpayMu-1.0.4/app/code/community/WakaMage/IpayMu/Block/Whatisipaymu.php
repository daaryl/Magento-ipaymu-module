<?php 
/**
 * Magento
 *
 * @author    WakaMage http://www.wakamage.com <cs@wakamage.com>
 * @copyright Copyright (C) 2013 WakaMage. (http://www.wakamage.com)
 *
 */
class WakaMage_IpayMu_Block_Whatisipaymu extends Mage_Core_Block_Abstract
{
    protected function _toHtml()
    {
        echo '<img src="'.Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).'/ipaymu/what-is-ipaymu.png"/>';
		echo '<br />';
		echo '<p><strong>Apa Itu IPAYMU?</strong><br />';
		echo 'IPAYMU adalah suatu cara pembayaran online ataupun pengiriman uang yang berfungsi untuk memudahkan pengguna dalam bertransaksi dengan menggunakan layanan internet.</p>';
		echo '<p><strong>Bagi Anda yang bukan member IPAYMU</strong><br />';
		echo 'Anda tetap bisa melakukan pembayaran dengan IPAYMU dengan cara transfer bank ke rekening unik IPAYMU. Nomor rekening unik IPAYMU akan dikirimkan lewat email setelah Anda melakukan proses pembayaran non member IPAYMU.</p>';
		echo '<p><strong>Bank apa saja yang bisa digunakan untuk bertransaksi di IPAYMU?</strong><br />';
		echo 'IPAYMU bekerja sama dengan 137 Bank di Indonesia. Untuk melihat daftar bank, silahkan <a href="https://ipaymu.com/daftar-bank/" target="_blank">klik disini</a>.</p>';
		echo '<p><strong>Apakah IPAYMU aman?</strong><br />';
		echo 'Ya, IPAYMU menggunakan 256 bit SSL encryption dan telah diverifikasi oleh Thawte.</p>';
		echo '<p><strong>Daftar IPAYMU dan dapatkan kemudahan dan keamanan transaksi online</strong><br />';
		echo 'Untuk mendaftar IPAYMU, silahkan <a href="https://my.ipaymu.com/?rid=wakamin" target="_blank">klik disini<a>, tapi sebelumnya mohon untuk menyelesaikan proses belanja dahulu :).</p>';
    }
}

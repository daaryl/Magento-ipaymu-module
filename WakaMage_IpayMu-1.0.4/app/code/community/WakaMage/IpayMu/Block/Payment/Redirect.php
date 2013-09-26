<?php
/**
 * Magento
 *
 * @author    WakaMage http://www.wakamage.com <cs@wakamage.com>
 * @copyright Copyright (C) 2013 WakaMage. (http://www.wakamage.com)
 *
 */

class WakaMage_IpayMu_Block_Payment_Redirect
{
    public function __construct()
    {
		// URL Payment IPAYMU
		$url = 'https://my.ipaymu.com/payment.htm';
		 
		// Prepare Parameters
		$params = array(
					'key'      => Mage::getStoreConfig('payment/ipaymu/key'), // API Key Merchant / Penjual
					'action'   => 'payment',
					'product'  => Mage::helper('ipaymu')->getProducts(),
					'price'    => Mage::helper('ipaymu')->getTotalPrice(), // Total Harga
					'quantity' => 1,
					'comments' => 'Note: Keterangan jumlah maksudnya adalah dalam 1 kali order', // Optional           
					'ureturn'  => Mage::getBaseUrl().'ipaymu/payment/response',
					'unotify'  => Mage::getBaseUrl().'ipaymu/payment/notify',
					'ucancel'  => Mage::getBaseUrl().'checkout/cart',
		 
					/* Parameter untuk pembayaran lain menggunakan PayPal 
					 * ----------------------------------------------- 
					'invoice_number' => uniqid('INV-'), // Optional
					'paypal_email'   => 'email_paypal_merchant',
					'paypal_price'   => 1, // Total harga dalam kurs USD
					/* ----------------------------------------------- */
					 
					'format'   => 'json' // Format: xml / json. Default: xml 
				);
		 
		$params_string = http_build_query($params);
		 
		//open connection
		$ch = curl_init();
		 
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, count($params));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		 
		//execute post
		$request = curl_exec($ch);
		 
		if ( $request === false ) {
			echo 'Curl Error: ' . curl_error($ch);
		} else {
			 
			$result = json_decode($request, true);
		 
			if( isset($result['url']) )
				header('location: '. $result['url']);
			else {
				echo "Request Error ". $result['Status'] .": ". $result['Keterangan'];
			}
		}
		 
		//close connection
		curl_close($ch);
	}
}
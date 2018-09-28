<?php
 /**
 * Magento Community Edition
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Clarion
 * @package    Clarion_OnestepCheckout
 * @created    5th Dec, 2014 2:13pm
 * @author     Clarion magento team<magento@clariontechnologies.co.in>
 * @purpose    One step checkout observer
 * @copyright  Copyright (c) 2014 Clarion Technologies Pvt.Ltd
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License
 */ 
class Ravi_Detailsave_Model_Observer
{
	public function afterBillingMethod($observer){
	$post = Mage::app()->getRequest()->getPost();
	if($post['billing']['region_id']){
		$region = Mage::getModel('directory/region')->load($post['billing']['region_id']);
		$state_name = $region->getName();
	}else{
		$state_name = $post['billing']['region'];
	}
	$country = Mage::getModel('directory/country')->loadByCode($post['billing']['country_id']);
	$country_name = $country->getName();
	$data = array('customer_first_name'=>$post['billing']['firstname'],
				  'customer_last_name'=>$post['billing']['lastname'],
				  'customer_email'=>$post['billing']['email'],
				  'customer_phone'=>$post['billing']['telephone'],
				  'customer_country'=>$country_name,
				  'customer_state'=>$state_name,
				  'customer_city'=>$post['billing']['city']
				  ); 
	
	//echo '<pre>';
	//print_r($post);
	//echo '<br>======================<br>';
	//print_r($data);
	//die;
	$model = Mage::getModel('detailsave/detailsave');		
			$model->setData($data);	
	$model->save();
	//die;
  }
}
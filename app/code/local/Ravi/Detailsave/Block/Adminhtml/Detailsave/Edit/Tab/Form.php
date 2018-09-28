<?php

class Ravi_Detailsave_Block_Adminhtml_Detailsave_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('detailsave_form', array('legend'=>Mage::helper('detailsave')->__('Customer Details')));
     
      $fieldset->addField('customer_first_name', 'text', array(
          'label'     => Mage::helper('detailsave')->__('First Name'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'customer_first_name',
      ));
	  
	  $fieldset->addField('customer_last_name', 'text', array(
          'label'     => Mage::helper('detailsave')->__('Last Name'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'customer_last_name',
      ));
	  
	  $fieldset->addField('customer_email', 'text', array(
          'label'     => Mage::helper('detailsave')->__('Email'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'customer_email',
      ));
	  
	  $fieldset->addField('customer_phone', 'text', array(
          'label'     => Mage::helper('detailsave')->__('Phone'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'customer_phone',
      ));
	  
	  $fieldset->addField('customer_country', 'text', array(
          'label'     => Mage::helper('detailsave')->__('Country'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'customer_country',
      ));
	  
	  $fieldset->addField('customer_state', 'text', array(
          'label'     => Mage::helper('detailsave')->__('State'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'customer_state',
      ));
	  
	  $fieldset->addField('customer_city', 'text', array(
          'label'     => Mage::helper('detailsave')->__('City'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'customer_city',
      ));

      
     
      if ( Mage::getSingleton('adminhtml/session')->getDetailsaveData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getDetailsaveData());
          Mage::getSingleton('adminhtml/session')->setDetailsaveData(null);
      } elseif ( Mage::registry('detailsave_data') ) {
          $form->setValues(Mage::registry('detailsave_data')->getData());
      }
      return parent::_prepareForm();
  }
}
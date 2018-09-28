<?php

class Ravi_Detailsave_Block_Adminhtml_Detailsave_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('detailsave_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('detailsave')->__('Customer Details'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('detailsave')->__('Customer Detailsn'),
          'title'     => Mage::helper('detailsave')->__('Customer Details'),
          'content'   => $this->getLayout()->createBlock('detailsave/adminhtml_detailsave_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}
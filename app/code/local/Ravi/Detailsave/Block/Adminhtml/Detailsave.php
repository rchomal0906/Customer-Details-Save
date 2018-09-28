<?php
class Ravi_Detailsave_Block_Adminhtml_Detailsave extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_detailsave';
    $this->_blockGroup = 'detailsave';
    $this->_headerText = Mage::helper('detailsave')->__('Customer Details Manager');
    $this->_addButtonLabel = Mage::helper('detailsave')->__('Add New Customer Details');
    parent::__construct();
  }
}
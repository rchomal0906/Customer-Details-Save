<?php

class Ravi_Detailsave_Block_Adminhtml_Detailsave_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'detailsave';
        $this->_controller = 'adminhtml_detailsave';
        
        $this->_updateButton('save', 'label', Mage::helper('detailsave')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('detailsave')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('detailsave_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'detailsave_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'detailsave_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('detailsave_data') && Mage::registry('detailsave_data')->getId() ) {
            return Mage::helper('detailsave')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('detailsave_data')->getTitle()));
        } else {
            return Mage::helper('detailsave')->__('Add Customer Details');
        }
    }
}
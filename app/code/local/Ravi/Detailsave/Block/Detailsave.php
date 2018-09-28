<?php
class Ravi_Detailsave_Block_Detailsave extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getDetailsave()     
     { 
        if (!$this->hasData('detailsave')) {
            $this->setData('detailsave', Mage::registry('detailsave'));
        }
        return $this->getData('detailsave');
        
    }
}
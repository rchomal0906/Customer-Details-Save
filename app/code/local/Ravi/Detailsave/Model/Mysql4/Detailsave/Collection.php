<?php

class Ravi_Detailsave_Model_Mysql4_Detailsave_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('detailsave/detailsave');
    }
}
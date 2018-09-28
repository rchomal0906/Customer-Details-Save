<?php

class Ravi_Detailsave_Model_Mysql4_Detailsave extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the detailsave_id refers to the key field in your database table.
        $this->_init('detailsave/detailsave', 'detailsave_id');
    }
}
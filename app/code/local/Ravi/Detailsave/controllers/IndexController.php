<?php
class Ravi_Detailsave_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/detailsave?id=15 
    	 *  or
    	 * http://site.com/detailsave/id/15 	
    	 */
    	/* 
		$detailsave_id = $this->getRequest()->getParam('id');

  		if($detailsave_id != null && $detailsave_id != '')	{
			$detailsave = Mage::getModel('detailsave/detailsave')->load($detailsave_id)->getData();
		} else {
			$detailsave = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($detailsave == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$detailsaveTable = $resource->getTableName('detailsave');
			
			$select = $read->select()
			   ->from($detailsaveTable,array('detailsave_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$detailsave = $read->fetchRow($select);
		}
		Mage::register('detailsave', $detailsave);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}
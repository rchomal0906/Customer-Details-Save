<?php

class Ravi_Detailsave_Block_Adminhtml_Detailsave_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('detailsaveGrid');
      $this->setDefaultSort('detailsave_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('detailsave/detailsave')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('detailsave_id', array(
          'header'    => Mage::helper('detailsave')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'detailsave_id',
      ));

      $this->addColumn('customer_first_name', array(
          'header'    => Mage::helper('detailsave')->__('First Name'),
          'align'     =>'left',
          'index'     => 'customer_first_name',
      ));

	 $this->addColumn('customer_last_name', array(
          'header'    => Mage::helper('detailsave')->__('Last Name'),
          'align'     =>'left',
          'index'     => 'customer_last_name',
      ));
	  
	  $this->addColumn('customer_email', array(
          'header'    => Mage::helper('detailsave')->__('Email'),
          'align'     =>'left',
          'index'     => 'customer_email',
      ));
	  
	  $this->addColumn('customer_phone', array(
          'header'    => Mage::helper('detailsave')->__('Phone'),
          'align'     =>'left',
          'index'     => 'customer_phone',
      ));
	  
	  $this->addColumn('customer_country', array(
          'header'    => Mage::helper('detailsave')->__('Country'),
          'align'     =>'left',
          'index'     => 'customer_country',
      ));
	  
	  $this->addColumn('customer_state', array(
          'header'    => Mage::helper('detailsave')->__('State'),
          'align'     =>'left',
          'index'     => 'customer_state',
      ));
	  
	  $this->addColumn('customer_city', array(
          'header'    => Mage::helper('detailsave')->__('City'),
          'align'     =>'left',
          'index'     => 'customer_city',
      ));
	  
        //$this->addColumn('action',
//            array(
//                'header'    =>  Mage::helper('detailsave')->__('Action'),
//                'width'     => '100',
//                'type'      => 'action',
//                'getter'    => 'getId',
//                'actions'   => array(
//                    array(
//                        'caption'   => Mage::helper('detailsave')->__('Edit'),
//                        'url'       => array('base'=> '*/*/edit'),
//                        'field'     => 'id'
//                    )
//                ),
//                'filter'    => false,
//                'sortable'  => false,
//                'index'     => 'stores',
//                'is_system' => true,
//        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('detailsave')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('detailsave')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('detailsave_id');
        $this->getMassactionBlock()->setFormFieldName('detailsave');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('detailsave')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('detailsave')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('detailsave/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('detailsave')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('detailsave')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}
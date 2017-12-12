<?php

class Training_Cms_Block_Adminhtml_Page_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    protected function _construct()
    {
        parent::_construct();

        $this->setId('page_id');
        $this->setDefaultSort('page_id');
    }

    protected function _prepareCollection()
    {
        /** @var Training_Cms_Model_Resource_Page_Collection $collection */
        $collection = Mage::getResourceModel('training_cms/page_collection');
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
       $this->addColumn(
           'page_id',
           array(
               'header' => $this->__('Page Id'),
               'width' => '50px',
               'index' => 'page_id',
               'sortable' => true,
               'filter' => false,
           )
       );
       $this->addColumn(
           'category_id',
           array(
               'header' => $this->__('Category Id'),
               'width' => '50px',
               'index' => 'category_id',
               'sortable' => false,
               'filter' => false,
           )
       );
       $this->addColumn(
           'code',
           array(
               'header' => $this->__('Code'),
               'width' => '50px',
               'index' => 'code',
               'sortable' => false,
           )
       );
       $this->addColumn(
           'title',
           array(
               'header' => $this->__('Title'),
               'width' => '50px',
               'index' => 'title',
               'sortable' => false,
           )
       );
       $this->addColumn(
           'url',
           array(
               'header' => $this->__('Url'),
               'width' => '50px',
               'index' => 'url',
               'sortable' => false,
               'filter' => false,
           )
       );
       $this->addColumn(
           'description',
           array(
               'header' => $this->__('Description'),
               'width' => '50px',
               'index' => 'description',
               'sortable' => false,
               'filter' => false,
           )
       );
       $this->addColumn(
           'short_description',
           array(
               'header' => $this->__('Short Description'),
               'width' => '50px',
               'index' => 'short_description',
               'sortable' => false,
               'filter' => false,
           )
       );
       $this->addColumn(
           'created_at',
           array(
               'header' => $this->__('Created At'),
               'width' => '50px',
               'index' => 'created_at',
               'sortable' => true,
               'filter' => false,
           )
       );
       $this->addColumn(
           'updated_at',
           array(
               'header' => $this->__('Updated At'),
               'width' => '50px',
               'index' => 'updated_at',
               'sortable' => true,
               'filter' => false,
           )
       );
       $this->addColumn(
           'action',
           array(
               'header' => $this->__('Actions'),
               'width' => '50px',
               'type' => 'action',
               'getter' => 'getPageId',
               'actions' => array(
                   array(
                       'caption' => $this->__('Edit'),
                       'url' => array('base' => '*/*/edit'),
                       'field' => 'page_id',
                   ),
                   array(
                       'caption' => $this->__('Delete'),
                       'url' => array('base' => '*/*/delete'),
                       'field' => 'page_id',
                   ),
               )
           )
       );

        return parent::_prepareColumns();
    }

    /**
     * @param Training_Cms_Model_Page $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('page_id' => $row->getId()));
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('training_cms_page_id');
        $this->getMassactionBlock()->setFormFieldName('page_id');

        $this->getMassactionBlock()->addItem('delete', array(
            'label'=> $this->__('Delete pages'),
            'url'  => $this->getUrl('*/*/massDelete', array('' => '')),
            'confirm' => $this->__('Are you sure?')
        ));

        return $this;
    }
}

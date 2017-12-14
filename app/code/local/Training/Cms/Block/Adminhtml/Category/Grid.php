<?php

class Training_Cms_Block_Adminhtml_Category_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    protected function _construct()
    {
        parent::_construct();

        $this->setId('category_id');
        $this->setDefaultSort('category_id');
    }

    protected function _prepareCollection()
    {
        /** @var Training_Cms_Model_Resource_Category_Collection $collection */
        $collection = Mage::getResourceModel('training_cms/category_collection');
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
       $this->addColumn(
           'category_id',
           array(
               'header' => $this->__('Category Id'),
               'width' => '50px',
               'index' => 'category_id',
               'sortable' => true,
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
               'sortable' => false,
               'filter' => false,
               'getter' => 'getCategoryId',
               'actions' => array(
                   array(
                       'caption' => $this->__('Edit'),
                       'url' => array('base' => '*/*/edit'),
                       'field' => 'category_id',
                   ),
                   array(
                       'caption' => $this->__('Delete'),
                       'url' => array('base' => '*/*/delete'),
                       'field' => 'category_id',
                   ),
               )
           )
       );

        return parent::_prepareColumns();
    }

    /**
     * @param Training_Cms_Model_Category $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('category_id' => $row->getId()));
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('training_cms_category_id');
        $this->getMassactionBlock()->setFormFieldName('category_id');

        $this->getMassactionBlock()->addItem('delete', array(
            'label'=> $this->__('Delete categories'),
            'url'  => $this->getUrl('*/*/massDelete', array('' => '')),
            'confirm' => $this->__('Are you sure?')
        ));

        return $this;
    }
}

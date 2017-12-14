<?php

class Training_Cms_Block_Adminhtml_Category_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'category_id';
        $this->_blockGroup = 'training_cms';
        $this->_controller = 'adminhtml_category';
        $this->_mode = 'edit';
        $modelTitle = $this->_getModelTitle();
        $this->_updateButton('save', 'label', $this->__("Save $modelTitle"));
        $this->_updateButton('delete', 'label', $this->__("Delete $modelTitle"));

        $this->_addButton('save_and_create',
            array(
                'label' => $this->__("Save $modelTitle And Create New"),
                'onclick' => 'saveAndCreateNew()',
                'class' => 'save'
            ), -100);
        $this->_formScripts[] = "
             function saveAndCreateNew() {
                editForm.submit($('edit_form').action + 'back/new/');
             }";

        parent::__construct();
    }

    /**
     * @return Training_Cms_Helper_Data
     */
    protected function _getHelper(){
        return Mage::helper('training_cms');
    }

    /**
     * @return Training_Cms_Model_Category
     */
    protected function _getModel(){
        return Mage::registry('current_cms_category');
    }


    protected function _getModelTitle(){
        return 'Category';
    }

    /**
     * @return string
     */
    public function getHeaderText()
    {
        $model = $this->_getModel();
        $modelTitle = $this->_getModelTitle();
        if ($model && $model->getId()) {
            return $this->__("Edit $modelTitle (ID: {$model->getId()})");
        }

        return $this->__("New $modelTitle");
    }

    /**
     * Get URL for back (reset) button
     *
     * @return string
     */
    public function getBackUrl()
    {
        return $this->getUrl('*/*/index');
    }

    /**
     * Get URL for delete button
     * @return string
     * @throws Exception
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', array($this->_objectId => $this->getRequest()->getParam($this->_objectId)));
    }

    /**
     * Get URL for submitting form
     * @return string
     * @throws Exception
     */
    public function getFormActionUrl()
    {
        return $this->getUrl('*/*/save', array($this->_objectId => $this->getRequest()->getParam($this->_objectId)));
    }
}

<?php

class Training_Cms_Block_Adminhtml_Category extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'training_cms';
        $this->_controller = 'adminhtml_category';
        $this->_headerText = $this->__('List Categories');

        parent::_construct();
    }
}
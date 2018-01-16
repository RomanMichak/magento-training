<?php

class Training_Cms_Model_Eav_Page extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('training_cms/eav_page');
    }

    protected function _afterSave()
    {
        Mage::dispatchEvent('training_cms_eav_page_save_after', ['page' => $this]);
        return parent::_afterSave();
    }
}
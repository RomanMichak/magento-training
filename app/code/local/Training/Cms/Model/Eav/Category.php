<?php

class Training_Cms_Model_Eav_Category extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('training_cms/eav_category');
    }

    protected function _afterSave()
    {
        Mage::dispatchEvent('training_cms_eav_category_save_after', ['category' => $this]);
        return parent::_afterSave();
    }
}
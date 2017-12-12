<?php

class Training_Cms_Model_Resource_Page extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Define table with key
     */
    protected function _construct()
    {
        $this->_init('training_cms/page', 'page_id');
    }
}

<?php

class Training_Cms_Model_Resource_Eav_Page_Collection extends Mage_Eav_Model_Entity_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('training_cms/eav_page');
    }
}
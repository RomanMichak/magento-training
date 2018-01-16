<?php

class Training_Cms_Model_Resource_Category_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function __construct()
    {
        $this->_init('training_cms/category');
        parent::__construct();
    }
}
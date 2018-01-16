<?php

class Training_Cms_Model_Resource_Eav_Category extends Mage_Eav_Model_Entity_Abstract
{
    public function __construct()
    {
        $resource = Mage::getSingleton('core/resource');
        $this->setType('training_cms_eav_category');
        $this->setConnection(
            $resource->getConnection('core_read'),
            $resource->getConnection('core_write')
        );
    }
}
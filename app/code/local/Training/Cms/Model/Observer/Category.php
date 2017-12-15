<?php

class Training_Cms_Model_Observer_Category
{
    public function reindexEavToFlat(Varien_Event_Observer $observer)
    {
        try {
            /** @var Training_Cms_Model_Eav_Category $eavCategory */
            $eavCategory = $observer->getCategory();

            /** @var Training_Cms_Model_Category $flatCategory */
            $flatCategory = Mage::getModel('training_cms/category')->load($eavCategory->getCategoryId());
            $flatCategory->setData($eavCategory->getData());
            $flatCategory->save();
        } catch (Exception $e) {
            Mage::logException($e);
        }
    }
}
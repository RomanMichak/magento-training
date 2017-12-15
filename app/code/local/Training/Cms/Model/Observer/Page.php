<?php

class Training_Cms_Model_Observer_Page
{
    public function reindexEavToFlat(Varien_Event_Observer $observer)
    {
        try {
            /** @var Training_Cms_Model_Eav_Page $eavPage */
            $eavPage = $observer->getPage();

            /** @var Training_Cms_Model_Page $flatPage */
            $flatPage = Mage::getModel('training_cms/page')->load($eavPage->getPageId());
            $flatPage->setData($eavPage->getData());
            $flatPage->save();
        } catch (Exception $e) {
            Mage::logException($e);
        }
    }
}
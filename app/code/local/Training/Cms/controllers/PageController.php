<?php

class Training_Cms_PageController extends Mage_Core_Controller_Front_Action
{
    public function viewAction()
    {
        /** @var string $configValue */
        $isOutput = Mage::getStoreConfig('training_cms_pages/pages/output');
        if (!(bool)$isOutput) {
            $this->norouteAction();
            return;
        }

        /** @var string $pageId */
        $pageId = $this->getRequest()->getParam('page_id');
        if (!$pageId) {
            $this->norouteAction();
            return;
        }

        /** @var Training_Cms_Model_Page $page */
        $page = Mage::getModel('training_cms/page')->load($pageId);
        if (!$page->getId()) {
            $this->norouteAction();
            return;
        }

        $this->loadLayout();
        $this->getLayout()->getBlock('training_cms.page.view')->setData('page', $page);
        $this->renderLayout();

    }
}
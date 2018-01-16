<?php

class Training_Cms_CategoryController extends Mage_Core_Controller_Front_Action
{
    public function viewAction()
    {
        /** @var string $configValue */
        $isOutput = Mage::getStoreConfig('training_cms_pages/pages/output');
        if (!(bool)$isOutput) {
            $this->norouteAction();
            return;
        }

        /** @var string $categoryId */
        $categoryId = $this->getRequest()->getParam('category_id');
        if (!$categoryId) {
            $this->norouteAction();
            return;
        }

        /** @var Training_Cms_Model_Category $category */
        $category = Mage::getModel('training_cms/category')->load($categoryId);
        if (!$category->getId()) {
            $this->norouteAction();
            return;
        }

        $this->loadLayout();
        $this->getLayout()->getBlock('training_cms.category.view')->setData('category', $category);
        $this->renderLayout();
    }
}
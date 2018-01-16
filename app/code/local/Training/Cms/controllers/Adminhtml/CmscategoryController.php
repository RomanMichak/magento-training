<?php

class Training_Cms_Adminhtml_CmscategoryController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_redirect('*/*/list');
    }

    /**
     * Display grid with categories
     */
    public function listAction()
    {
        $this->_getSession()->setFormData([]);

        $this->_title($this->__('Training Cms'))
             ->_title($this->__('Categories'));

        $this->loadLayout();

        $this->_setActiveMenu('training_cms');
        $this->_addBreadcrumb($this->__('Training Cms'), $this->__('Training Cms'));
        $this->_addBreadcrumb($this->__('Categories'), $this->__('Categories'));

        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout()->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        /** @var Training_Cms_Model_Category $model */
        $model = Mage::getModel('training_cms/category');
        $id = $this->getRequest()->getParam('category_id');

        try {
            Mage::register('current_cms_category', $model);

            if ($id) {
                if (!$model->load($id)->getId()) {
                    Mage::throwException($this->__('No training cms category with ID "%s" found.', $id));
                }
            }

            $categoryTitle = $this->__('New cms category');
            if ($model->getId()) {
                $categoryTitle = $this->__('Edit %s cms category', $model->getTitle());
            }

            $this->_title($this->__('Training Cms'))
                ->_title($this->__('Category'))
                ->_title($this->__($categoryTitle));

            $this->loadLayout();

            $this->_setActiveMenu('training_cms/cmscategory');
            $this->_addBreadcrumb($this->__('Training Cms'), $this->__('Training Cms'));
            $this->_addBreadcrumb($this->__('Category'), $this->__('Category'));
            $this->_addBreadcrumb($categoryTitle, $categoryTitle);

            $this->renderLayout();
        } catch (Exception $exception) {
            Mage::logException($exception);
            $this->_getSession()->addError($exception->getMessage());
            $this->_redirect('*/*/list');
        }
    }

    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {

            $this->_getSession()->setFormData($data);
            /** @var Training_Cms_Model_Eav_Category $model */
            $model = Mage::getModel('training_cms/eav_category');
            $id = $this->getRequest()->getParam('category_id');

            try {
                if ($id) {
                    $model->load($id);
                }
                $model->addData($data);
                $model->save();

                $this->_getSession()->addSuccess($this->__('Cms category was successfully saved!'));

                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/new');
                    return;
                }
                $this->_redirect('*/*/list');

            } catch (Exception $exception) {
                Mage::logException($exception);
                $this->_getSession()->addError($exception->getMessage());
                if ($model && $model->getId()) {
                    $this->_redirect('*/*/edit', ['category_id' => $model->getId()]);
                    return;
                }
                $this->_redirect('*/*/new');
            }
            return;
        }

        $this->_getSession()->addError($this->__('Nothing to save'));
        $this->_redirect('*/*');
    }

    public function deleteAction()
    {
        /** @var Training_Cms_Model_Eav_Category $model */
        $model = Mage::getModel('training_cms/eav_category');
        $id = $this->getRequest()->getParam('category_id');

        try {
            if ($id) {
                if (!$model->load($id)->getId()) {
                    Mage::throwException($this->__('No training cms category with ID "%s" found.', $id));
                }

                $model->delete();

                $this->_getSession()->addSuccess($this->__('Category (id %d) was successfully deleted', $id));
                $this->_redirect('*/*');
            }

        } catch (Exception $exception) {
            Mage::logException($exception);
            $this->_getSession()->addError($exception->getMessage());
            $this->_redirect('*/*');
        }
    }

    /**
     * Delete few categories in a row by ids
     */
    public function massDeleteAction()
    {
        $categoryIds = $this->getRequest()->getParam('category_id');
        if(!is_array($categoryIds)) {
            $this->_getSession()->addError($this->__('Please select category(s).'));
        } else {
            try {
                /** @var Training_Cms_Model_Eav_Category $categories */
                $categories = Mage::getModel('training_cms/eav_category');
                foreach ($categoryIds as $categoryId) {
                    $categories->load($categoryId);
                    $categories->delete();
                }
                $this->_getSession()->addSuccess($this->__('Total of %d record(s) were deleted.', count($categoryIds)));
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/list');
    }
}

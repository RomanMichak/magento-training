<?php

class Training_Cms_Adminhtml_CmspageController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_redirect('*/*/list');
    }

    /**
     * Display grid with pages
     */
    public function listAction()
    {

        $this->_getSession()->setFormData([]);

        $this->_title($this->__('Training Cms'))
             ->_title($this->__('Pages'));

        $this->loadLayout();

        $this->_setActiveMenu('training_cms');
        $this->_addBreadcrumb($this->__('Training Cms'), $this->__('Training Cms'));
        $this->_addBreadcrumb($this->__('Pages'), $this->__('Pages'));

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
        /** @var Training_Cms_Model_Page $model */
        $model = Mage::getModel('training_cms/page');
        $id = $this->getRequest()->getParam('id');

        try {
            Mage::register('current_cms_page', $model);

            if ($id) {
                if (!$model->load($id)->getId()) {
                    Mage::throwException($this->__('No training cms page with ID "%s" found.', $id));
                }
            }

            if ($model->getId()) {
                $pageTitle = $this->__('Edit %s cms page', $model->getTitle());
            } else {
                $pageTitle = $this->__('New cms page');
            }
            $this->_title($this->__('Training Cms'))
                ->_title($this->__('Page'))
                ->_title($this->__($pageTitle));

            $this->loadLayout();

            $this->_setActiveMenu('training_cms/cmspage');
            $this->_addBreadcrumb($this->__('Training Cms'), $this->__('Training Cms'));
            $this->_addBreadcrumb($this->__('Pages'), $this->__('Pages'));
            $this->_addBreadcrumb($pageTitle, $pageTitle);

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
            /** @var Training_Cms_Model_Page $model */
            $model = Mage::getModel('training_cms/page');
            $id = $this->getRequest()->getParam('id');

            try {
                if ($id) {
                    $model->load($id);
                }
                $model->addData($data);
                $model->save();

                $this->_getSession()->addSuccess($this->__('Cms page was successfully saved!'));

                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', ['id' => $model->getId()]);
                } else {
                    $this->_redirect('*/*/list');
                }
            } catch (Exception $exception) {
                Mage::logException($exception);
                $this->_getSession()->addError($exception->getMessage());
                if ($model && $model->getId()) {
                    $this->_redirect('*/*/edit', ['id' => $model->getId()]);
                } else {
                    $this->_redirect('*/*/new');
                }
            }

            return;
        }

        $this->_getSession()->addError($this->__('Nothing to save'));
        $this->_redirect('*/*');
    }

    public function deleteAction()
    {
        /** @var Training_Cms_Model_Page $model */
        $model = Mage::getModel('training_cms/page');
        $id = $this->getRequest()->getParam('id');

        try {
            if ($id) {
                if (!$model->load($id)->getId()) {
                    Mage::throwException($this->__('No training cms page with ID "%s" found.', $id));
                }

                $model->delete();

                $this->_getSession()->addSuccess($this->__('Page (id %d) was successfully deleted', $id));
                $this->_redirect('*/*');
            }

        } catch (Exception $exception) {
            Mage::logException($exception);
            $this->_getSession()->addError($exception->getMessage());
            $this->_redirect('*/*');
        }
    }

    /**
     * Delete few pages in a row by their ids
     */
    public function massDeleteAction()
    {
        $pageIds = $this->getRequest()->getParam('page_id');
        if(!is_array($pageIds)) {
            $this->_getSession()->addError($this->__('Please select page(s).'));
        } else {
            try {
                $pages = Mage::getModel('training_cms/page');
                foreach ($pageIds as $pageId) {
                    $pages->load($pageId);
                    $pages->delete();
                }
                $this->_getSession()->addSuccess($this->__('Total of %d record(s) were deleted.', count($pageIds)));
                $this->_redirect('*/*/list');
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
                $this->_redirect('*/*/list');
            }
        }
    }
}
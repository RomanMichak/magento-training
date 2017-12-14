<?php

class Training_Cms_Controller_Router extends Mage_Core_Controller_Varien_Router_Standard
{
    /**
     * @param Mage_Core_Controller_Request_Http $request
     * @return bool
     */
    public function match(Zend_Controller_Request_Http $request)
    {
        if (!Mage::isInstalled()) {
            Mage::app()->getFrontController()->getResponse()
                ->setRedirect(Mage::getUrl('install'))
                ->sendResponse();
            exit;
        }

        $pathInfo = trim($request->getPathInfo(), '/');
        $params = explode('/', $pathInfo);

        if (isset($params[0]) && $params[0] === 'cmsblog') {

            $controllerName = 'page';
            if (count($params) <= 3) {
                if (isset($params[1])) {
                    $categoryUri = $params[1];
                    /** @var Training_Cms_Model_Category $categoryMatch */
                    $categoryMatch = Mage::getModel('training_cms/category')->loadByUrl($categoryUri);

                    if ($categoryMatch->getId()) {
                        $request->setParam('category_id', $categoryMatch->getId());
                        $controllerName = 'category';

                        if (isset($params[2])) {
                            $pageUri = $params[2];
                            /** @var Training_Cms_Model_Page $pageMatch */
                            $pageMatch = Mage::getModel('training_cms/page')->loadByCategoryAndUrl($categoryMatch->getId(), $pageUri);

                            $controllerName = 'page';
                            $request->setParam('page_id', $pageMatch->getId());
                        }
                    } else {
                        $pageUri = $params[1];
                        /** @var Training_Cms_Model_Page $pageMatch */
                        $pageMatch = Mage::getModel('training_cms/page')->loadByUrl($pageUri);

                        if ($pageMatch->getId()) {
                            $request->setParam('page_id', $pageMatch->getId());
                            $controllerName = 'page';
                        }
                    }
                }
            }

            $request->setAlias(
                Mage_Core_Model_Url_Rewrite::REWRITE_REQUEST_PATH_ALIAS,
                $pathInfo
            );

            $controllerClassName = $this->_validateControllerClassName('Training_Cms', $controllerName);

            // Get controller class instance for dispatching action
            $controllerInstance = Mage::getControllerInstance(
                $controllerClassName,
                $request,
                $this->getFront()->getResponse()
            );
            $request->setModuleName('cmspage');
            $request->setControllerName($controllerName);
            $request->setActionName('view');
            $request->setRouteName('cmspage');
            $request->setDispatched();
            $controllerInstance->dispatch('view');
            return true;
        }
        return false;
    }
}

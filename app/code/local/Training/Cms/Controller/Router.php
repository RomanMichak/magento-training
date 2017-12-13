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
                $request->setModuleName('cmsblog')
                    ->setControllerName('blog')
                    ->setActionName('view');
            if (count($params) === 2) {
                $request->setParam('page_url', $params[1]);
            }

            $request->setAlias(
                Mage_Core_Model_Url_Rewrite::REWRITE_REQUEST_PATH_ALIAS,
                $pathInfo
            );

            /** @var string $controllerClassName */
            $controllerClassName = $this->_validateControllerClassName(
                'Training_Cms',
                'blog'
            );

            // Get controller class instance for dispatching action
            $controllerInstance = Mage::getControllerInstance(
                $controllerClassName,
                $request,
                $this->getFront()->getResponse()
            );
            $request->setRouteName('cmsblog');
            $request->setDispatched();
            $controllerInstance->dispatch('view');

            return true;
        }
        return false;
    }
}

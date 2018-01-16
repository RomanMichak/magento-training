<?php

class Training_Cms_Model_Page extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('training_cms/page');
    }

    /**
     * @param string $code
     * @return Training_Cms_Model_Page
     */
    public function loadByCode($code)
    {
        return $this->load($code, 'code');
    }

    /**
     * @param string $url
     * @return Training_Cms_Model_Page
     */
    public function loadByUrl($url)
    {
        return $this->load($url, 'url');
    }

    /**
     * @param int $categoryId
     * @param string $pageUrl
     * @return Training_Cms_Model_Page
     */
    public function loadByCategoryAndUrl($categoryId, $pageUrl)
    {
        $collection = $this->getCollection()
            ->addFieldToFilter('category_id', $categoryId)
            ->addFieldToFilter('url', $pageUrl);
        return $collection->getFirstItem();
    }

    protected function _beforeSave()
    {
        $this->addData(['updated_at' => time()]);
        return parent::_beforeSave();
    }
}

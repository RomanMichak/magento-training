<?php

class Training_Cms_Model_Category extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('training_cms/category');
    }

    /**
     * @param string $code
     * @return Training_Cms_Model_Category
     */
    public function loadByCode($code)
    {
        return $this->load($code, 'code');
    }


    /**
     * @param string $url
     * @return Training_Cms_Model_Category
     */
    public function loadByUrl($url)
    {
        return $this->load($url, 'url');
    }

    /**
     * @return Mage_Core_Model_Abstract
     */
    protected function _beforeSave()
    {
        $this->addData(['updated_at' => time()]);
        return parent::_beforeSave();
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        /** @var Training_Cms_Model_Category[] $categories */
        $categories = Mage::getModel('training_cms/category')->getCollection()->load();

        $options = [];

        foreach ($categories as $category) {
            $options[] = array(
                'value' => $category->getId(),
                'label' => $category->getTitle(),
            );
        }
        return $options;
    }

    /**
     * @return array|Training_Cms_Model_Resource_Page[]
     */
    public function getPages()
    {
        if ($this->getId()) {
            return Mage::getModel('training_cms/page')
                ->getCollection()
                ->addFieldToFilter('category_id',$this->getId())
                ->load();
        }
        return [];
    }
}


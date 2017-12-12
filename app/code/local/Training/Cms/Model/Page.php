<?php

class Training_Cms_Model_Page extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('training_cms/page');
    }

    /**
     * @param string $code
     * @return Mage_Core_Model_Abstract
     */
    public function loadByCode($code)
    {
        return $this->load($code, 'code');
    }

    protected function _beforeSave()
    {
        $this->addData(['updated_at' => time()]);
        return parent::_beforeSave();
    }
}

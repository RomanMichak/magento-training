<?php

class Training_Cms_Block_Adminhtml_Category_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('training_cms_category_form');
        $this->setTitle($this->__('CMS Category Information'));
    }

    /**
     * @return Training_Cms_Block_Adminhtml_Category_Edit_Form
     * @throws Exception
     */
    protected function _prepareForm()
    {
        /** @var Training_Cms_Model_Category $model */
        $model = Mage::registry('current_cms_category');

        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array('category_id' => $this->getRequest()->getParam('category_id'))),
            'method' => 'post'
        ));

        $fieldset = $form->addFieldset(
            'base_fieldset',
            array(
                'legend' => $this->__('CMS Category Information'),
                'class' => 'fieldset-wide',
            )
        );

        if ($model->getId()) {
            $fieldset->addField('category_id', 'hidden', array('name' => 'category_id'));
        }
        
        $fieldset->addField(
            'code',
            'text',
            array(
                'name' => 'code',
                'label' => $this->__('Code'),
                'title' => $this->__('Code'),
                'required' => true,
                'class' => 'validate-code'
            )
        );
        $fieldset->addField(
            'title',
            'text',
            array(
                'name' => 'title',
                'label' => $this->__('Title'),
                'title' => $this->__('Title'),
                'required' => true,
            )
        );
        $fieldset->addField(
            'url',
            'text',
            array(
                'name' => 'url',
                'label' => $this->__('Url'),
                'title' => $this->__('Url'),
                'required' => true,
                'class' => 'validate-alphanum',
            )
        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}

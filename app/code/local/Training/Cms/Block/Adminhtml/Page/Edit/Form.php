<?php

class Training_Cms_Block_Adminhtml_Page_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('training_cms_page_form');
        $this->setTitle($this->__('CMS Page Information'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('current_cms_page');

        $form = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method'    => 'post'
        ));

        $fieldset = $form->addFieldset(
            'base_fieldset',
            array(
                'legend'=> $this->__('CMS Page Information'),
                'class' => 'fieldset-wide',
            )
        );

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', array('name' => 'id'));
        }

        $fieldset->addField(
            'category_id',
            'select',
            array(
                'name' => 'category_id',
                'options' => ['1' => '1', '2' => '2', '3' => '3'],
                'label' => $this->__('Category'),
                'title' => $this->__('Category'),
                'required' => true,
            )
        );
        $fieldset->addField(
            'code',
            'text',
            array(
                'name' => 'code',
                'label' => $this->__('Code'),
                'title' => $this->__('Code'),
                'required' => true,
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
            )
        );
        $fieldset->addField(
            'short_description',
            'textarea',
            array(
                'name' => 'short_description',
                'label' => $this->__('Short Description'),
                'title' => $this->__('Short Description'),
                'required' => true,
            )
        );
        $fieldset->addField(
            'description',
            'textarea',
            array(
                'name' => 'description',
                'label' => $this->__('Description'),
                'title' => $this->__('Description'),
                'required' => true,
            )
        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}

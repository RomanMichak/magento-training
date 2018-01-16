<?php

class Training_Cms_Model_Resource_Eav_Setup extends Mage_Eav_Model_Entity_Setup
{

    public function getDefaultEntities()
    {
        $entityAttributes = array(
            'training_cms_eav_category' => array(
                'entity_model' => 'training_cms/eav_category',
                'attribute_model' => '',
                'table' => 'training_cms/eav_category',
                'attributes' => array(
                    'category_id' => array(
                        'type' => 'int',
                        'label' => 'Category Id',
                        'input' => 'text',
                        'global' => 1,
                        'visible' => true,
                        'required' => true,
                        'user_defined' => true,
                        'visible_on_front' => true
                    ),
                    'title' => array(
                        'type' => 'varchar',
                        'label' => 'Title',
                        'input' => 'text',
                        'global' => 1,
                        'visible' => true,
                        'required' => true,
                        'user_defined' => true,
                        'visible_on_front' => true
                    ),
                    'url' => array(
                        'type' => 'varchar',
                        'label' => 'Url',
                        'input' => 'text',
                        'class' => 'validate-alphanum',
                        'global' => 1,
                        'visible' => true,
                        'required' => true,
                        'user_defined' => true,
                        'visible_on_front' => true
                    ),
                    'code' => array(
                        'type' => 'varchar',
                        'label' => 'Code',
                        'input' => 'text',
                        'global' => 1,
                        'visible' => false,
                        'required' => true,
                        'user_defined' => true,
                        'visible_on_front' => false,
                    ),
                    'created_at' => array(
                        'type' => 'datetime',
                        'label' => 'Created At',
                        'input' => 'text',
                        'global' => 1,
                        'visible' => false,
                        'required' => true,
                        'user_defined' => true,
                        'visible_on_front' => false,
                    ),
                    'updated_at' => array(
                        'type' => 'datetime',
                        'label' => 'Updated At',
                        'input' => 'text',
                        'global' => 1,
                        'visible' => false,
                        'required' => true,
                        'user_defined' => true,
                        'visible_on_front' => false,
                    ),
                ),
            ),
            'training_cms_eav_page' => array(
                'entity_model' => 'training_cms/eav_page',
                'attribute_model' => '',
                'table' => 'training_cms/eav_page',
                'attributes' => array(
                    'page_id' => array(
                        'type' => 'int',
                        'label' => 'Category Id',
                        'input' => 'text',
                        'global' => 1,
                        'visible' => true,
                        'required' => true,
                        'user_defined' => true,
                        'visible_on_front' => true
                    ),
                    'category_id' => array(
                        'type' => 'int',
                        'label' => 'Category Id',
                        'input' => 'text',
                        'global' => 1,
                        'visible' => true,
                        'required' => true,
                        'user_defined' => true,
                        'visible_on_front' => true
                    ),
                    'title' => array(
                        'type' => 'varchar',
                        'label' => 'Title',
                        'input' => 'text',
                        'global' => 1,
                        'visible' => true,
                        'required' => true,
                        'user_defined' => true,
                        'visible_on_front' => true
                    ),
                    'url' => array(
                        'type' => 'varchar',
                        'label' => 'Url',
                        'input' => 'text',
                        'class' => 'validate-alphanum',
                        'global' => 1,
                        'visible' => true,
                        'required' => true,
                        'user_defined' => true,
                        'visible_on_front' => true
                    ),
                    'code' => array(
                        'type' => 'varchar',
                        'label' => 'Code',
                        'input' => 'text',
                        'global' => 1,
                        'visible' => false,
                        'required' => true,
                        'user_defined' => true,
                        'visible_on_front' => false,
                    ),
                    'short_description' => array(
                        'type' => 'text',
                        'label' => 'Short Description',
                        'input' => 'textarea',
                        'global' => 1,
                        'visible' => false,
                        'required' => true,
                        'user_defined' => true,
                        'visible_on_front' => false,
                    ),
                    'description' => array(
                        'type' => 'text',
                        'label' => 'Description',
                        'input' => 'textarea',
                        'global' => 1,
                        'visible' => false,
                        'required' => true,
                        'user_defined' => true,
                        'visible_on_front' => false,
                    ),
                    'created_at' => array(
                        'type' => 'datetime',
                        'label' => 'Created At',
                        'input' => 'text',
                        'global' => 1,
                        'visible' => false,
                        'required' => true,
                        'user_defined' => true,
                        'visible_on_front' => false,
                    ),
                    'updated_at' => array(
                        'type' => 'datetime',
                        'label' => 'Updated At',
                        'input' => 'text',
                        'global' => 1,
                        'visible' => false,
                        'required' => true,
                        'user_defined' => true,
                        'visible_on_front' => false,
                    ),
                ),
            )
        );

        return $entityAttributes;
    }
}
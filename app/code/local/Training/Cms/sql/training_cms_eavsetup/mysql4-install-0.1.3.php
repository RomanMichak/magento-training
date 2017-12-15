<?php

/** @var Training_Cms_Model_Resource_Eav_Setup $installer */
$installer = $this;

try {
    $installer->startSetup();

    $this->createEntityTables('training_cms/eav_category');
    $this->createEntityTables('training_cms/eav_page');
    $this->addEntityType(Training_Cms_Model_Resource_Eav_Category::ENTITY, [
        'entity_model' => 'training_cms/eav_category',
        'attribute_model' => '',
        'table' => 'training_cms/eav_category',
        'increment_model' => '',
        'increment_per_store' => '0'
    ]);
    $this->addEntityType(Training_Cms_Model_Resource_Eav_Page::ENTITY, [
        'entity_model' => 'training_cms/eav_page',
        'attribute_model' => '',
        'table' => 'training_cms/eav_page',
        'increment_model' => '',
        'increment_per_store' => '0'
    ]);

    $this->installEntities();

    $installer->endSetup();
} catch (Exception $e) {
    Mage::logException($e);
}
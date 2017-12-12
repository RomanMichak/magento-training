<?php

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

/**
 * Altering table training_cms_page with adding category_id field
 */
$installer->getConnection()
    ->addColumn(
        $installer->getTable('training_cms/page'),
        'category_id',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_INTEGER,
            'nullable' => false,
            'unsigned' => true,
            'comment'  => 'CategoryId'
        )
    );

$installer->endSetup();

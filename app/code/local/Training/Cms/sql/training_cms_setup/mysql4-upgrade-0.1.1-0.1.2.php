<?php

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

/**
 * Creating a table training_cms_page
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('training_cms/category'))
    ->addColumn(
        'category_id',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        null,
        array(
            'identity' => true,
            'unsigned' => true,
            'nullable' => false,
            'primary' => true,
        ),
        'CategoryId'
    )
    ->addColumn(
        'code',
        Varien_Db_Ddl_Table::TYPE_VARCHAR,
        255,
        array(
            'nullable' => false,
        ),
        'Code'
    )
    ->addColumn(
        'title',
        Varien_Db_Ddl_Table::TYPE_VARCHAR,
        255,
        array(
            'nullable' => false,
        ),
        'Title'
    )
    ->addColumn(
        'url',
        Varien_Db_Ddl_Table::TYPE_VARCHAR,
        255,
        array(
            'nullable' => false,
        ),
        'Url'
    )
    ->addColumn(
        'created_at',
        Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
        null,
        array(
            'nullable' => false,
            'default' => Varien_Db_Ddl_Table::TIMESTAMP_INIT,
        ),
        'CreatedAt'
    )
    ->addColumn(
        'updated_at',
        Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
        null,
        array(
            'nullable' => false,
            'default' => Varien_Db_Ddl_Table::TIMESTAMP_INIT_UPDATE,
        ),
        'UpdatedAt'
    );
$installer->getConnection()->createTable($table);

$installer->getConnection()->addForeignKey(
    $installer->getFkName('training_cms/page', 'category_id', 'training_cms/category','category_id'),
    $installer->getTable('training_cms/page'),
    'category_id',
    $installer->getTable('training_cms/category'),
    'category_id',
    Varien_Db_Ddl_Table::ACTION_CASCADE,
    Varien_Db_Ddl_Table::ACTION_CASCADE
);

$installer->endSetup();

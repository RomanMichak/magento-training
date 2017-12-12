<?php

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

/**
 * Creating a table training_cms_page
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('training_cms/page'))
    ->addColumn(
        'page_id',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        null,
        array(
            'identity' => true,
            'unsigned' => true,
            'nullable' => false,
            'primary' => true,
        ),
        'PageId'
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
        'Title'
    )
    ->addColumn(
        'short_description',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        null,
        array(
            'nullable' => true,
        ),
        'ShortDescription'
    )
    ->addColumn(
        'description',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        null,
        array(
            'nullable' => true,
        ),
        'Description'
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

$installer->endSetup(); 

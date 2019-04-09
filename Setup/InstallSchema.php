<?php
namespace My\Subscription\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\InstallSchemaInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        /**
         * Create table subscription
         */
        $table = $setup->getConnection()->newTable($setup->getTable('subscription'))
            ->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'primary' => true
                ],
                'Subscription ID'
            )
            ->addColumn(
                'name',
                Table::TYPE_TEXT,
                50,
                [
                    'nullable' => false,
                    'default' => '',
                ],
                'Name'
            )
            ->addColumn(
                'description',
                Table::TYPE_TEXT,
                255,
                [
                    'nullable' => false,
                    'default' => '',
                ],
                'Description'
            )
            ->addColumn(
                'dated',
                Table::TYPE_DATE,
                20,
                [
                    'nullable' => true,
                    'default' => Date('Y-m-d'),
                ],
                'Date of subscription'
            )->setComment('Subscription table is a new table. It contains users subscription information.');
        $setup->getConnection()->createTable($table);
    }

    // @todo add index

}

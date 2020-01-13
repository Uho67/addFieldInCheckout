<?php
/**
 * Copyright © 2009-2017 Vaimo Group. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Vaimo\ClemondoMarkGoods\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Vaimo\ClemondoMarkGoods\Api\Data\AttributeInterface as Attribute;

/**
 * Class InstallSchema
 * @package Vaimo\ClemondoMarkGoods\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $connection = $installer->getConnection();
        if ($connection->tableColumnExists('sales_order', Attribute::REFERENCE_CUSTOMER) === false) {
            $connection
                ->addColumn(
                    $setup->getTable('sales_order'),
                    Attribute::REFERENCE_CUSTOMER,
                    [
                        'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        'comment' => 'Reference customer email',
                        'size' => 50
                    ]
                );
        }
        if ($connection->tableColumnExists('quote', Attribute::REFERENCE_CUSTOMER) === false) {
            $connection
                ->addColumn(
                    $setup->getTable('quote'),
                    Attribute::REFERENCE_CUSTOMER,
                    [
                        'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        'comment' => 'Reference customer email',
                        'size' => 50
                    ]
                );
        }
        $installer->endSetup();
    }
}

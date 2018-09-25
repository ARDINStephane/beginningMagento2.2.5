<?php
namespace Stephane\Contacts\Setup;

use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Upgrade the Catalog module DB scheme
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '0.2.0', '<')) {

            $tableName = $setup->getTable('stephane_contacts');
            $setup->getConnection()->addColumn($tableName, 'comment', [
                'type' => Table::TYPE_TEXT,
                'length'    => 255,
                'unsigned' => true,
                'nullable' => false,
                'default' => '0',
                'comment' => 'Comment'
            ]);
        }else  if (version_compare($context->getVersion(), '0.3.0', '<')) {

            /**
             * Add full text index to our table department
             */

            $tableName = $setup->getTable('stephane_contacts');
            $fullTextIntex = array('name','email'); // Column with fulltext index, you can put multiple fields
            $setup->getConnection()->addIndex(
                $tableName,
                $setup->getIdxName($tableName, $fullTextIntex, AdapterInterface::INDEX_TYPE_FULLTEXT),
                $fullTextIntex,
                AdapterInterface::INDEX_TYPE_FULLTEXT
            );
        }
        $setup->endSetup();
    }
}
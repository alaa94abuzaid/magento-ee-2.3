<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Alhayat\ServiceContract\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
* Patch is mechanism, that allows to do atomic upgrade data changes
*/
class InsertPostSampleData implements
    DataPatchInterface
{
    /**
     * Constants for table and column name
     */
    const TABLE_NAME = 'stackoverflow_post_service_contract';
    const COLUMN_NAME = 'name';
    const COLUMN_DESCRIPTION = 'description';

    /**
     * @var ModuleDataSetupInterface $moduleDataSetup
     */
    private $moduleDataSetup;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * Do Upgrade
     *
     * @return void
     */
    public function apply()
    {
        $connection = $this->moduleDataSetup->getConnection();
        $connection->startSetup();
        if ($this->moduleDataSetup->tableExists(self::TABLE_NAME) === true
            && $connection->tableColumnExists(self::TABLE_NAME, self::COLUMN_NAME) === true
            && $connection->tableColumnExists(self::TABLE_NAME, self::COLUMN_DESCRIPTION) === true
        ) {
            $data = $this->getDataToAdd();
            $connection->insertMultiple(
                $this->moduleDataSetup->getTable(self::TABLE_NAME),
                $data
            );
        }
        $connection->endSetup();
    }

    private function getDataToAdd()
    {
        return [
            [
                self::COLUMN_NAME => 'Item 1',
                self::COLUMN_DESCRIPTION => 'Item 1 Description'
            ],
            [
                self::COLUMN_NAME => 'Item 2',
                self::COLUMN_DESCRIPTION => 'Item 2 Description'

            ],
            [
                self::COLUMN_NAME => 'Item 3',
                self::COLUMN_DESCRIPTION => 'Item 3 Description'

            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [

        ];
    }
}

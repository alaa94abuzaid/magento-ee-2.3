<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Alhayat\BannerSlider\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
* Patch is mechanism, that allows to do atomic upgrade data changes
*/
class InsertGroupSampleData implements
    DataPatchInterface
{
    /**
     * Constants for table and column name
     */
    const TABLE_BANNER_GROUP = 'alhayat_banners_slider_group';
    const COLUMN_GROUP_NAME = 'name';

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
        if ($this->moduleDataSetup->tableExists(self::TABLE_BANNER_GROUP) === true
            && $connection->tableColumnExists(self::TABLE_BANNER_GROUP, self::COLUMN_GROUP_NAME) === true
        ) {
            $data = $this->getDataToAdd();
            $connection->insertMultiple(
                $this->moduleDataSetup->getTable(self::TABLE_BANNER_GROUP),
                $data
            );
        }
        $connection->endSetup();
    }

    /**
     * SHORT DESCRIPTION
     * LONG DESCRIPTION LINE BY LINE
     * @return array
     */
    private function getDataToAdd()
    {
        return [
            [
                self::COLUMN_GROUP_NAME => 'Group One'
            ],
            [
                self::COLUMN_GROUP_NAME => 'Group Two'
            ],
            [
                self::COLUMN_GROUP_NAME => 'Group Three'
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

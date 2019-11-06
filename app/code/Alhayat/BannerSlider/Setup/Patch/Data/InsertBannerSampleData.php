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
class InsertBannerSampleData implements
    DataPatchInterface
{
    /**
     * Constants for table and column name
     */
    const TABLE_BANNER_SLIDER = 'alhayat_banners_slider';
    const COLUMN_BANNER_NAME = 'name';
    const COLUMN_BANNER_URL = 'url';
    const COLUMN_BANNER_IMAGE = 'image';
    const COLUMN_BANNER_STATUS = 'status';
    const COLUMN_BANNER_STORE_ID = 'store_id';
    const COLUMN_BANNER_SORT_ORDER = 'order';
    const COLUMN_BANNER_GROUP_ID = 'group_id';

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
        if ($this->moduleDataSetup->tableExists(self::TABLE_BANNER_SLIDER) === true
            && $connection->tableColumnExists(self::TABLE_BANNER_SLIDER, self::COLUMN_BANNER_NAME) === true
            && $connection->tableColumnExists(self::TABLE_BANNER_SLIDER, self::COLUMN_BANNER_URL) === true
            && $connection->tableColumnExists(self::TABLE_BANNER_SLIDER, self::COLUMN_BANNER_IMAGE) === true
            && $connection->tableColumnExists(self::TABLE_BANNER_SLIDER, self::COLUMN_BANNER_STATUS) === true
            && $connection->tableColumnExists(self::TABLE_BANNER_SLIDER, self::COLUMN_BANNER_STORE_ID) === true
            && $connection->tableColumnExists(self::TABLE_BANNER_SLIDER, self::COLUMN_BANNER_SORT_ORDER) === true
            && $connection->tableColumnExists(self::TABLE_BANNER_SLIDER, self::COLUMN_BANNER_GROUP_ID) === true

        ) {
            $data = $this->getDataToAdd();
            $connection->insertMultiple(
                $this->moduleDataSetup->getTable(self::TABLE_BANNER_SLIDER),
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
                self::COLUMN_BANNER_NAME => 'Banner One',
                self::COLUMN_BANNER_URL  => 'https://web.facebook.com/',
                self::COLUMN_BANNER_IMAGE => 'path/to/image1/',
                self::COLUMN_BANNER_STATUS => 2,
                self::COLUMN_BANNER_STORE_ID => 1,
                self::COLUMN_BANNER_SORT_ORDER => 1,
                self::COLUMN_BANNER_GROUP_ID => 1
            ],
            [
                self::COLUMN_BANNER_NAME => 'Banner Two',
                self::COLUMN_BANNER_URL  => 'https://web.twitter.com/',
                self::COLUMN_BANNER_IMAGE => 'path/to/image2/',
                self::COLUMN_BANNER_STATUS => 1,
                self::COLUMN_BANNER_STORE_ID => 1,
                self::COLUMN_BANNER_SORT_ORDER => 1,
                self::COLUMN_BANNER_GROUP_ID => 1
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
            \Alhayat\BannerSlider\Setup\Patch\Data\InsertGroupSampleData::class
        ];
    }
}

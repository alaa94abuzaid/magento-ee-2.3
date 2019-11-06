<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 23/10/19
 * Time: 10:43 PM
 */

namespace Alhayat\BannerSlider\Model;

class Banner extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Banner cache tag
     */
    const CACHE_TAG = 'alhayat_banners_slider';

    /**#@+
     * Banner's statuses
     */
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 2;

    /**#@-*/

    /**#@-*/
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'alhayat_banners_slider';

    /**
     * SHORT DESCRIPTION
     * LONG DESCRIPTION LINE BY LINE
     */
    protected function _construct()
    {
        $this->_init(\Alhayat\BannerSlider\Model\ResourceModel\Banner::class);
    }

    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }
}

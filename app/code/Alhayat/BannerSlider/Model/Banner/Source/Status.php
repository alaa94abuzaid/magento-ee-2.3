<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 24/10/19
 * Time: 5:23 PM
 */

namespace Alhayat\BannerSlider\Model\Banner\Source;


use Magento\Cms\Model\Page;
use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class IsActive
 */
class Status implements OptionSourceInterface
{
    /**
     * @var \Alhayat\BannerSlider\Model\Banner
     */
    protected $banner;


    public function __construct(\Alhayat\BannerSlider\Model\Banner $banner)
    {
        $this->banner = $banner;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $availableOptions = $this->banner->getAvailableStatuses();
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}

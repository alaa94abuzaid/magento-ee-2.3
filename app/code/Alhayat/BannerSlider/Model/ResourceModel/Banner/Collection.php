<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 23/10/19
 * Time: 10:45 PM
 */

namespace Alhayat\BannerSlider\Model\ResourceModel\Banner;

use Alhayat\BannerSlider\Model\Banner;
use Alhayat\BannerSlider\Model\ResourceModel\Banner as BannerResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(Banner::class, BannerResourceModel::class);
    }
}

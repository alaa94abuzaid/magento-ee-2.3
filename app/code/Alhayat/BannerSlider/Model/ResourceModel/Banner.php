<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 23/10/19
 * Time: 10:44 PM
 */

namespace Alhayat\BannerSlider\Model\ResourceModel;

class Banner extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('alhayat_banners_slider', 'id');
    }
}

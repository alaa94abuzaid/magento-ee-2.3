<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 26/10/19
 * Time: 8:33 PM
 */

namespace Alhayat\BannerSlider\Block\Adminhtml\Banner\Edit;

use Alhayat\BannerSlider\Block\Adminhtml\Banner\Edit\GenericButton;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class SaveButton
 * @package Alhayat\BannerSlider\Block\Adminhtml\Banner\Edit
 */
class SaveButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Save button
     *
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        if ($this->_isAllowedAction('PHPCuong_BannerSlider::banner_create') || $this->_isAllowedAction('PHPCuong_BannerSlider::banner_update')) {
            $data =  [
                    'label' => __('Save Banner'),
                    'class' => 'save primary',
                    'data_attribute' => [
                        'mage-init' => ['button' => ['event' => 'save']],
                        'form-role' => 'save',
                    ],
                    'sort_order' => 50,
                ];
        }

        return $data;
    }
}

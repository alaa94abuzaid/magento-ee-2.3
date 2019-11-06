<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 26/10/19
 * Time: 8:29 PM
 */

namespace Alhayat\BannerSlider\Block\Adminhtml\Banner\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\AuthorizationInterface;

/**
 * Class GenericButton
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var AuthorizationInterface
     */
    protected $authorization;

    public function __construct(
        AuthorizationInterface $authorization,
        Context $context
    ) {
        $this->authorization = $authorization;
        $this->context = $context;
    }

    /**
     * Return Banner ID
     *
     * @return int
     */
    public function getBannerId()
    {
        return (int)$this->context->getRequest()->getParam('id');
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }

    protected function _isAllowedAction($resourceId)
    {
        return $this->authorization->isAllowed($resourceId);
    }
}

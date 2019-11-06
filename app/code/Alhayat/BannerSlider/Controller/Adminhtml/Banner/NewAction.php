<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 25/10/19
 * Time: 12:03 AM
 */

namespace Alhayat\BannerSlider\Controller\Adminhtml\Banner;

use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Forward;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Registry;
use Magento\Backend\App\Action\Context;

class NewAction extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Alhayat_BannerSlider::banner_create';

    /**
     * @var ForwardFactory $resultForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @var Registry $coreRegistry
     */
    protected $coreRegistry;

    /**
     * NewAction constructor.
     * @param Context $context
     * @param Registry $coreRegistry
     * @param ForwardFactory $resultForwardFactory
     */
    public function __construct(
        Context $context,
        Registry$coreRegistry,
        ForwardFactory $resultForwardFactory
    ) {
        $this->coreRegistry = $coreRegistry;
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }

    /**
     * SHORT DESCRIPTION
     * LONG DESCRIPTION LINE BY LINE
     * @return ResponseInterface|Forward|ResultInterface
     */
    public function execute()
    {
        /** @var Forward $resultForward */
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}

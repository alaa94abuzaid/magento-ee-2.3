<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 23/10/19
 * Time: 10:34 PM
 */

namespace Alhayat\BannerSlider\Controller\Adminhtml\Banner;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Alhayat_BannerSlider::all_banners';

    /**
     * @var PageFactory $resultPageFactory
     */
    private $resultPageFactory;

    /**
     * Index constructor.
     * @param PageFactory $resultPageFactory
     * @param Action\Context $context
     */
    public function __construct(
        PageFactory $resultPageFactory,
        Action\Context $context
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * SHORT DESCRIPTION
     * LONG DESCRIPTION LINE BY LINE
     * @return ResponseInterface|ResultInterface|void
     */
    public function execute()
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Alhayat_BannerSlider::all_banners')
            ->addBreadcrumb(__('Banners Slider'), __('Banners Slider'))
            ->getConfig()->getTitle()->prepend(__('All Banners'));
        return $resultPage;
    }
}

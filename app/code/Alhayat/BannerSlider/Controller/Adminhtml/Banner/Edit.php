<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 25/10/19
 * Time: 12:02 AM
 */

namespace Alhayat\BannerSlider\Controller\Adminhtml\Banner;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class Edit extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory $resultPageFactory
     */
    private $resultPageFactory;

    /**
     * @var Registry $coreRegistry
     */
    private $coreRegistry;

    /**
     * Edit constructor.
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     * @param Action\Context $context
     */
    public function __construct(
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        Action\Context $context
    ) {
        $this->coreRegistry = $coreRegistry;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * SHORT DESCRIPTION
     * LONG DESCRIPTION LINE BY LINE
     * @return Page|Redirect|ResponseInterface|ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create(\Alhayat\BannerSlider\Model\Banner::class);

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This banner no longer exists.'));
                /** @var Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->coreRegistry->register('banners_slider', $model);

        // 3. Build edit form
        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Alhayat_BannerSlider::all_banners')
            ->addBreadcrumb(__('Banners Slider'), __('Banners Slider'))
            ->addBreadcrumb(__('All Banners'), __('All Banners'))
            ->addBreadcrumb(
            $id ? __('Edit Banner') : __('New Banner'),
            $id ? __('Edit Banner') : __('New Banner')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('All Banners'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getName() : __('New Banner'));
        return $resultPage;
    }

    /**
     * SHORT DESCRIPTION
     * LONG DESCRIPTION LINE BY LINE
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Alhayat_BannerSlider::banner_read') ||
        $this->_authorization->isAllowed('Alhayat_BannerSlider::banner_create');
    }
}

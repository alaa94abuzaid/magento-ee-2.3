<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 16/10/19
 * Time: 11:47 PM
 */

namespace Alhayat\TransactionalEmail\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Store\Model\StoreManagerInterface;
use Psr\Log\LoggerInterface;

class CustomerLoginSuccess implements ObserverInterface
{
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var TransportBuilder
     */
    private $transportBuilder;

    /**
     * CustomerLoginSuccess constructor.
     * @param StoreManagerInterface $storeManager
     * @param LoggerInterface $logger
     * @param TransportBuilder $transportBuilder
     */
    public function __construct(
        StoreManagerInterface $storeManager,
        LoggerInterface $logger,
        TransportBuilder $transportBuilder
    ) {
        $this->storeManager = $storeManager;
        $this->logger = $logger;
        $this->transportBuilder = $transportBuilder;
    }

    /**
     * @param Observer $observer
     * @return CustomerLoginSuccess
     * @throws NoSuchEntityException
     */
    public function execute(Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        if (!$customer) {
            return $this;
        }
        /* Receiver Detail */
        $receiverInfo = [
            'name' => 'Mudasser Hayat',
            'email' => 'alhayat.dev@gmail.com'
        ];

        $store = $this->storeManager->getStore();

        $templateParams = [
          'store' => $store,
          'customer' => $customer,
          'administrator_name' => $receiverInfo['name']
        ];

        $transport = $this->transportBuilder->setTemplateIdentifier(
            'alhayat_transactional_email_customer_logged_in_email_template'
            )->setTemplateOptions(
                ['area' => 'frontend', 'store' => $store->getId()]
            )->addTo(
                $receiverInfo['email'],
                $receiverInfo['name']
            )->setTemplateVars(
                $templateParams
            )->setFrom(
                'general'
            )->getTransport();
        try {
            $transport->sendMessage();
        } catch (\Exception $e) {
            $this->logger->critical('Message : ' . $e->getMessage());
        }
    }
}

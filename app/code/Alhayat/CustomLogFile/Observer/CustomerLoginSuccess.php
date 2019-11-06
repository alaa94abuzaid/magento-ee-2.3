<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 13/10/19
 * Time: 7:14 PM
 */

namespace Alhayat\CustomLogFile\Observer;

use Alhayat\CustomLogFile\Logger\Customer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CustomerLoginSuccess implements ObserverInterface
{
    /**
     * @var Customer $customerLogger
     */
    private $customerLogger;

    /**
     * CustomerLoginSuccess constructor.
     * @param Customer $customerLogger
     */
    public function __construct(Customer $customerLogger)
    {
        $this->customerLogger = $customerLogger;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $this->customerLogger->info('Customer ID : ' . $customer->getId() . ' has been logged in successfully.');
    }
}

<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 17/10/19
 * Time: 11:27 PM
 */

namespace Alhayat\ServiceContract\Controller\Index;

use Alhayat\ServiceContract\Model\ResourceModel\Post\CollectionFactory;
use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    private $collectionFactory;

    public function __construct(
        CollectionFactory $collectionFactory,
        Context $context
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return void
     */
    public function execute()
    {
        $collection = $this->collectionFactory->create();
        foreach ($collection->getItems() as $item) {
            echo $item->getData('name') . " : " . $item->getData('description');
            echo "<br>";
        }
        exit();
    }
}

<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 18/10/19
 * Time: 12:36 AM
 */

namespace Alhayat\ServiceContract\Model;

use Alhayat\ServiceContract\Api\PostRepositoryInterface;
use Alhayat\ServiceContract\Model\ResourceModel\Post\CollectionFactory;

class PostRepository implements PostRepositoryInterface
{
    private $collectionFactory;

    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    public function getList()
    {

    }
}

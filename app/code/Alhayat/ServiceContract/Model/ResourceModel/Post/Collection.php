<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 17/10/19
 * Time: 11:20 PM
 */

namespace Alhayat\ServiceContract\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(\Alhayat\ServiceContract\Model\Post::class, \Alhayat\ServiceContract\Model\ResourceModel\Post::class);
    }
}

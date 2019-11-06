<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 17/10/19
 * Time: 11:23 PM
 */

namespace Alhayat\ServiceContract\Model;

use Alhayat\ServiceContract\Api\Data\PostInterface;
use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel implements PostInterface
{
    protected function _construct()
    {
        $this->_init(\Alhayat\ServiceContract\Model\ResourceModel\Post::class);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_getData(self::NAME);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_getData(self::DESCRIPTION);
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->setData(self::NAME, $name);
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->setData(self::DESCRIPTION, $description);
    }

}

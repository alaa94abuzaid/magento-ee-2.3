<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 18/10/19
 * Time: 12:19 AM
 */

namespace Alhayat\ServiceContract\Api\Data;

interface PostInterface
{
    const POST_ID = 'id';
    const NAME = 'last_updated';
    const DESCRIPTION = 'expires';

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param $name
     */
    public function setName($name);

    /**
     * @param $description
     */
    public function setDescription($description);
}

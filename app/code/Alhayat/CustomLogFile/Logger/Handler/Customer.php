<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 13/10/19
 * Time: 9:48 PM
 */

namespace Alhayat\CustomLogFile\Logger\Handler;

use Magento\Framework\Filesystem\DriverInterface;
use Magento\Framework\Logger\Handler\Base;

class Customer extends Base
{
    /**
     * Logger Level
     * @var int
     */
    protected $loggerType = \Monolog\Logger::INFO;

    /**
     * Filename
     * @var string
     */
    protected $fileName = '/var/log/customer';

    /**
     * Customer constructor.
     * @param DriverInterface $filesystem
     * @param null $filePath
     * @param null $fileName
     * @throws \Exception
     */
    public function __construct(
        DriverInterface $filesystem,
        $filePath = null,
        $fileName = null
    ) {
        $fileName = $this->fileName . date('Y-m-d') . '.log';
        parent::__construct($filesystem, $filePath, $fileName);
    }
}

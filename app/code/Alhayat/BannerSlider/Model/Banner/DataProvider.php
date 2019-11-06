<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 26/10/19
 * Time: 4:29 PM
 */

namespace Alhayat\BannerSlider\Model\Banner;

use Alhayat\BannerSlider\Model\Banner;
use Alhayat\BannerSlider\Model\ResourceModel\Banner\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\Modifier\PoolInterface;

/**
 * Class DataProvider
 */
class DataProvider extends \Magento\Ui\DataProvider\ModifierPoolDataProvider
{
    /**
     * @var Collection $collection
     */
    protected $collection;

    /**
     * @var DataPersistorInterface $dataPersistor
     */
    protected $dataPersistor;

    /**
     * @var array
     */
    protected $loadedData;


    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $bannereCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = [],
        PoolInterface $pool = null
    ) {
        $this->collection = $bannereCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data, $pool);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        /** @var Banner $banner */
        foreach ($items as $banner) {
            $this->loadedData[$banner->getId()] = $banner->getData();
        }

        $data = $this->dataPersistor->get('banners_slider');
        if (!empty($data)) {
            $block = $this->collection->getNewEmptyItem();
            $block->setData($data);
            $this->loadedData[$block->getId()] = $block->getData();
            $this->dataPersistor->clear('banners_slider');
        }

        return $this->loadedData;
    }
}

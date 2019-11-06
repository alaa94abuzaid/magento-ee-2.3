<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 20/10/19
 * Time: 10:38 PM
 */

namespace Alhayat\TextLink\Plugin\Catalog\Helper;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Config;
use Magento\Framework\UrlInterface;

class Output
{
    /**
     * @var Config $eavConfig
     */
    private $eavConfig;

    /**
     * @var UrlInterface $urlInterface
     */
    private $urlInterface;

    /**
     * Output constructor.
     * @param Config $eavConfig
     * @param UrlInterface $urlInterface
     */
    public function __construct(
        Config $eavConfig,
        UrlInterface $urlInterface
    ) {
        $this->eavConfig = $eavConfig;
        $this->urlInterface = $urlInterface;
    }

    public function aroundProductAttribute(
        \Magento\Catalog\Helper\Output $output,
        \Closure $proceed,
        Product $product,
        $attributeHtml,
        $attributeName
    ) {
        $result = $proceed($product, $attributeHtml, $attributeName);
        $attribute = $this->eavConfig->getAttribute(Product::ENTITY, $attributeName);
        if ($attribute &&
            $attribute->getId() &&
            ($attribute->getAttributeCode() == 'description' || $attribute->getAttributeCode() == 'short_description')
        ) {
            $textLinkColor = 'black';
            $textLinkUrl = $this->urlInterface->getUrl('catalogsearch/result', ['q' => $textLinkColor]);
            $result = preg_replace('/' . $textLinkColor . '/i', '<a href="' . $textLinkUrl . '"><b>' . $textLinkColor . '</b></a>', $result);
        }
        return $result;
    }
}

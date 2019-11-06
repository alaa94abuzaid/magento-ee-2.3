<?php
/**
 * @author Alhayat MagentDev
 * @copyriht Copyright (c) 2019 Eguana {http://alhayatmagentdev.com}
 * Created by PhpStorm
 * User: mudasser
 * Date: 20/10/19
 * Time: 11:44 PM
 */

namespace Alhayat\Menu\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\View\LayoutInterface;

class TopmenuHtmlGetAfter implements ObserverInterface
{
    private $layout;

    public function __construct(
        LayoutInterface $layout
    ) {
        $this->layout = $layout;
    }

    /**
     * @param Observer $observer
     * @return TopmenuHtmlGetAfter
     */
    public function execute(Observer $observer)
    {
        $transportObject = $observer->getEvent()->getData('transportObject');
        if ($transportObject) {
            $textLinkHtml = $this->layout->createBlock('Magento\Framework\View\Element\Template')
                ->setTemplate('Alhayat_Menu::html/topmenu.phtml')->toHtml();
            // Add the FAQ link to end of the default menu.
            $topmenuHtml = $transportObject->getHtml() . $textLinkHtml;
            // Update the html to event
            $transportObject->setHtml($topmenuHtml);
        }
        return $this;
    }
}

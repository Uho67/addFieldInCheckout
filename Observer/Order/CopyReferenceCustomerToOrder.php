<?php
/**
 * Copyright © 2009-2017 Vaimo Group. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Vaimo\ClemondoMarkGoods\Observer\Order;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Vaimo\ClemondoMarkGoods\Api\Data\AttributeInterface as Attribute;

/**
 * Class CopyReferenceCustomerToOrder
 * @package Vaimo\ClemondoMarkGoods\Observer\Order
 */
class CopyReferenceCustomerToOrder implements ObserverInterface
{
    /**
     * @param Observer $observer
     *
     * @return $this|void
     */
    public function execute(Observer $observer)
    {
        $quote = $observer->getEvent()->getQuote();
        $order = $observer->getEvent()->getOrder();
        $order->setData(Attribute::REFERENCE_CUSTOMER, $quote->getReferenceCustomer());
    }
}

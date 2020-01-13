<?php
/**
 * Copyright © 2009-2017 Vaimo Group. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Vaimo\ClemondoMarkGoods\Plugin;

use Magento\Checkout\Model\PaymentInformationManagement;
use Magento\Quote\Api\Data\PaymentInterface;
use Magento\Quote\Api\Data\AddressInterface;
use Magento\Checkout\Model\SessionFactory;
use Vaimo\ClemondoMarkGoods\Api\Data\AttributeInterface as Attribute;

/**
 * Class PaymentInformationManagementPlugin
 * @package Vaimo\ClemondoMarkGoods\Plugin
 */
class PaymentInformationManagementPlugin
{
    private $checkoutSessionFactory;

    /**
     * PaymentInformationManagementPlugin constructor.
     *
     * @param SessionFactory $sessionFactory
     */
    public function __construct(SessionFactory $sessionFactory)
    {
        $this->checkoutSessionFactory = $sessionFactory;
    }

    /**
     * @param PaymentInformationManagement $subject
     * @param $cartId
     * @param PaymentInterface $paymentMethod
     * @param AddressInterface|null $billingAddress
     */
    public function beforeSavePaymentInformationAndPlaceOrder(
        PaymentInformationManagement $subject,
        $cartId,
        PaymentInterface $paymentMethod,
        AddressInterface $billingAddress = null
    ) {
        $dataReferenceCustomer = $paymentMethod->getExtensionAttributes()->getReferenceCustomer();
        if ($dataReferenceCustomer) {
            $quote = $this->checkoutSessionFactory->create()->getQuote();
            $quote->setData(Attribute::REFERENCE_CUSTOMER, $dataReferenceCustomer);
        }
    }
}

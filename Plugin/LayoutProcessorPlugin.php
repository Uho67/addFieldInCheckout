<?php
/**
 * Copyright © 2009-2017 Vaimo Group. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Vaimo\ClemondoMarkGoods\Plugin;

use Magento\Checkout\Block\Checkout\LayoutProcessor;

/**
 * Class LayoutProcessorPlugin
 * @package Vaimo\ClemondoMarkGoods\Plugin
 */
class LayoutProcessorPlugin
{
    /**
     * @param LayoutProcessor $subject
     * @param array $jsLayout
     *
     * @return array
     */
    public function afterProcess(
        LayoutProcessor $subject,
        array $jsLayout
    ) {
        $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']
        ['payment']['children']['payments-list']['children']['before-place-order']['children']['reference_customer_attribute'] = [
            'component' => 'Magento_Ui/js/form/element/abstract',
            'config' => [
                'elementTmpl' => 'ui/form/element/email',
                'customScope' => 'reference_customer',
                'template' => 'ui/form/field',
                'options' => [],
                'id' => 'reference_customer'
            ],
            'dataScope' => 'reference_customer',
            'label' => 'Reference customer',
            'validation' => [
                'validate-email' => true,
                'reference-email' => true
            ],
            'provider' => 'checkoutProvider',
            'visible' => true,
            'sortOrder' => 250,
            'id' => 'reference_customer'
        ];

        return $jsLayout;
    }
}

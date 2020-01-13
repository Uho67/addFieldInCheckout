/**
 * Copyright © Vaimo Group. All rights reserved.
 * See LICENSE.txt for license details.
 */

define([
           'uiRegistry',
           'jquery',
           'mage/utils/wrapper'
       ], function (registry, $, wrapper) {
    'use strict';

    return function (placeOrderAction) {

        return wrapper.wrap(placeOrderAction, function (originalAction, serviceUrl, payload, messageContainer) {
            if (payload.paymentMethod['extension_attributes'] === undefined) {
                payload.paymentMethod['extension_attributes'] = {};
            }
            payload.paymentMethod['extension_attributes']['reference_customer'] = registry.get("checkout.steps.billing-step.payment.payments-list.before-place-order.reference_customer_attribute").value();

            return originalAction(serviceUrl, payload, messageContainer);
        });
    };
});

/**
 * Copyright © Vaimo Group. All rights reserved.
 * See LICENSE.txt for license details.
 */
var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/model/place-order': {
                'Vaimo_ClemondoMarkGoods/js/checkout/place-order-mixing': true
            },
            'Magento_Ui/js/lib/validation/validator': {
                'Vaimo_ClemondoMarkGoods/js/validation/ui-validation-reference-email': true
            }
        }
    }
};
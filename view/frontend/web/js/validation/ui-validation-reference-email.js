/**
 * Copyright © Vaimo, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
           'jquery',
       ], function ($) {
    'use strict';

    return function (validator) {
        validator.addRule(
            'reference-email',
            function (value, params, additionalParams) {
                var data = {};
                data.email = value;
                // var customersEmails = ['asd0@gmail.com', 'asd1@gmail.com', 'asd2@gmail.com'];
                // return $.inArray(value, customersEmails) !== -1;
                $.ajax({
                           url: '/ClemondoMarkGoods/referencecustomer/checkemail',
                           type: 'post',
                           data: data,
                           success: function (response) {
                              console.log(response);
                           },
                           error: function(response) {
                               console.log(response)
                           }
                       });

                // $.post('/example.php', serializedData, function(response) {
                //     console.log("Response: "+response);
                // });
            },
            $.mage.__("Please specify a valid reference email")
        );
        return validator;
    }
});
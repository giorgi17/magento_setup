/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * @api
 */

define([
    'ko',
    'uiComponent',
    'Magento_Customer/js/customer-data',
    'Magento_Catalog/js/price-utils',
], function (ko, Component, customerData, priceUtils) {
    'use strict';

    return Component.extend({
        defaults: {
            total: ko.observable(''),
            shippingNumber: ko.observable(''),
            shipping: ko.observable(''),
            tax: ko.observable(''),
        },
        displaySubtotal: ko.observable(true),
        /**
         * @override
         */
        initialize: function () {
            this._super();
            this.cart = customerData.get('cart');
            this.cartData = customerData.get('cart-data');

            let currentTotal = 0;
            let currentShipping = 0;
            let currentTax = "Not available";

            if (this.cartData()?.totals?.total_segments) {
                currentTax = currentTax + this.cartData().totals.total_segments[0].value;
                currentShipping = priceUtils.formatPriceLocale(this.cartData().totals.total_segments[1].value);
                this.shippingNumber(this.cartData().totals.total_segments[1].value);
                currentTax = this.cartData().totals.total_segments[2].value;
            }

            if (this.cart()?.subtotalAmount) {
                currentTotal = priceUtils.formatPriceLocale(parseFloat(this.cart().subtotalAmount) + this.shippingNumber());
            }

            // Subscribe to changes in cart
            this.cart.subscribe(function (newValue) {
                if (newValue.subtotalAmount)
                    this.total(priceUtils.formatPriceLocale(parseFloat(newValue.subtotalAmount) + this.shippingNumber()))
            }, this);

            // Subscribe to changes in cartData
            this.cartData.subscribe(function (newValue) {
                console.log("newValue", newValue);
            }, this);

            this.total(currentTotal);
            this.shipping(currentShipping);
            if (currentTax === 0 && currentTax !== "Not available")
                this.tax("Free")
            else
                this.tax(currentTax);
        },
    });
});

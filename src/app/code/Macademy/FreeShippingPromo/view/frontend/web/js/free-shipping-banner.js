define([
    'uiComponent',
    'Magento_Customer/js/customer-data',
    'underscore',
    'knockout'
], function (
    Component,
    customerData,
    _,
    ko
) {
    'use strict';

    return Component.extend({
        defaults: {
            freeShippingThreshold: 100,
            subtotal: 0.00,
            template: 'Macademy_FreeShippingPromo/free-shipping-banner',
            // Turning properties into observables
            tracks: {
                subtotal: true
            }
        },
        initialize: function () {
            this._super();

            const self = this;
            const cart = customerData.get('cart');

            customerData.getInitCustomerData().done(function () {
                console.log(cart())
                if (!_.isEmpty(cart()) && !_.isUndefined(cart().subtotalAmount)) {
                    self.subtotal = parseFloat(cart().subtotalAmount);
                }
            })

            cart.subscribe(function (cart) {
                if (!_.isEmpty(cart) && !_.isUndefined(cart.subtotalAmount)) {
                    self.subtotal = parseFloat(cart.subtotalAmount);
                }
            })

            // Changing messages
            self.message = ko.computed(function () {
                if (_.isUndefined(self.subtotal) || self.subtotal === 0) {
                    return self.messageDefault.replace('{{freeShippingThreshold}}', self.freeShippingThreshold);
                }

                if (self.subtotal > 0 && self.subtotal < self.freeShippingThreshold) {
                    const subtotalRemaining = self.freeShippingThreshold - self.subtotal;
                    const formattedSubtotalRemaining = self.formatCurrency(subtotalRemaining)
                    return self.messageItemsInCart.replace('$XX.XX', formattedSubtotalRemaining);
                }

                if (self.subtotal >= self.freeShippingThreshold) {
                    return self.messageFreeShipping;
                }
            });
        },
        formatCurrency: function (value) {
            return '$' + value.toFixed(2);
        }
    });
})

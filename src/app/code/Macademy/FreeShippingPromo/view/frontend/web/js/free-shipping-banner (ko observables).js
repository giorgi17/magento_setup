define([
    'uiComponent',
    'ko'
], function (
    Component,
    ko
) {
    'use strict';

    return Component.extend({
        defaults: {
            // message: 'Free shipping message',
            subtotal: ko.observable(33.00),
            template: 'Macademy_FreeShippingPromo/free-shipping-banner',
        },
        initialize: function () {
            this._super();

            var self = this;
            window.setTimeout(function () {
                self.subtotal(35.00);
            }, 2000)

            console.log(this.message);
        },
        formatCurrency: function (value) {
            return '$' + value().toFixed(2);
        }
    });
})

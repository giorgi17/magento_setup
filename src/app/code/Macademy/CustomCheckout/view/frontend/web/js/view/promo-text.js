define([
    'uiComponent',
    'ko',
    'Magento_Checkout/js/model/step-navigator',
], function (
    Component,
    ko,
    stepNavigator,
) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Macademy_CustomCheckout/promo-text',
            promoText: ko.observable(''),
        },
        initialize: function () {
            this._super();
            const DISCOUNT_PRICE = 100;
            let newPromoText = '';

            const currentTotalPrice = parseFloat(window.checkoutConfig.quoteData.subtotal);
            const difference = currentTotalPrice - DISCOUNT_PRICE;

            if (difference < 0) {
                newPromoText = `Add $${Math.abs(difference).toFixed(2)} of items to your cart to receive a promo code for 10% off your entire order.`;
            } else {
                newPromoText = 'Congrats! Use promo code GET100 for 10% off your entire order.';
            }

            this.promoText(newPromoText);

            return this;
        },
        isVisible: function () {
            return !stepNavigator.isProcessed('shipping');
        },
    });
});

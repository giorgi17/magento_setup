define([], function () {
    'use strict';

    return function (Component) {
        return Component.extend({
            defaults: {
                template: 'Macademy_CheckoutMessages/summary/cart-items',
                // Not a good practice to use "exports", because it can be hard to debug. Better to use "imports" instead.
                exports: {
                    'totals.subtotal': 'checkout.sidebar.guarantee:subtotal'
                }
            },
            isItemsBlockExpanded: function () {
                return true;
            }
        });
    }
})

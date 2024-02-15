define([
    'Magento_Checkout/js/view/summary/cart-items'
], function (
    Component
) {
    'use strict';

    return Component.extend({
        // This method actually already is overloaded in "CheckoutMessages" module, but mixin is used there,
        // in this module the overload is done with xml, inside "checkout_index_index.xml" layout.
        isItemsBlockExpanded: function () {
            return true;
        }
    });
})

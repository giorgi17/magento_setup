define([
    'ko',
    'Magento_Checkout/js/view/form/element/email',
    'Magento_Customer/js/model/customer',
], function (
    ko,
    Component,
    customer,
) {
    'use strict';

    return Component.extend({
        initialize() {
            this._super();

            const currentSavedCustomerEmail = customer.customerData.email;
            const isCustomerLoggedIn = this.isCustomerLoggedIn;

            if (isCustomerLoggedIn) {
                this.email(currentSavedCustomerEmail);
            }
        },
    })
})

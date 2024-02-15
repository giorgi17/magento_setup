define([
    'uiComponent',
    'ko',
    'Magento_Customer/js/model/customer',
], function (
    Component,
    ko,
    customer,
) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Macademy_CustomCheckout/logged-in-helper',
            customerName: customer.customerData.firstname,
            storePhoneNumberObs: ko.observable(),
            isLoggedIn: customer.isLoggedIn,
        },
        initialize: function () {
            this._super();

            if (this.storePhoneNumber && !this.storePhoneNumberObs()) {
                this.storePhoneNumberObs(this.storePhoneNumber);
            }

            return this;
        },
    });
});

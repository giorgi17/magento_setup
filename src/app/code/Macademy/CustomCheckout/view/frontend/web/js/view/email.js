define([
    'uiComponent',
    'ko',
    'Magento_Checkout/js/model/step-navigator',
    'mage/translate',
    'underscore',
    'Magento_Checkout/js/model/quote',
    'Magento_Customer/js/model/customer',
    'jquery',
    'Magento_Checkout/js/model/customer-email-validator',
    'mage/storage',
    'mage/url',
], function (
    Component,
    ko,
    stepNavigator,
    $t,
    _,
    quote,
    customer,
    $,
    customerEmailValidator,
    storage,
    url,
) {
    'use string';

    const loginFormSelector = 'form[data-role=email-with-possible-login]';

    return Component.extend({
        defaults: {
            template: 'Macademy_CustomCheckout/email',
            isVisible: ko.observable(false),
        },
        quoteIsVirtual: quote.isVirtual(),
        initialize: function () {
            this._super();

            stepNavigator.registerStep(
                'email',
                null,
                $t('Email'),
                this.isVisible,
                _.bind(this.navigate, this),
                this.sortOrder,
            );

            return this;
        },
        validateNewEmail: function () {
            $(loginFormSelector).validation();
            return Boolean($(loginFormSelector + ' input[name=username]').valid());
        },
        getCurrentInputEmail: function () {
            return $(loginFormSelector);
        },
        getUpdateEmailUrl() {
            return url.build('macademy-customCheckout/account/updateEmail');
        },
        updateEmail: function () {
            const inputValue = $(loginFormSelector + ' input[name=username]').val();

            $.ajax({
                url: this.getUpdateEmailUrl(),
                method: 'POST',
                dataType: 'json',
                data: { email: inputValue, customerId: window.customerData.id },
                success: function (response) {
                    console.log('updateEmail response:', response);
                },
                error: function (response) {
                    console.error('updateEmail response error:', response);
                }
            });
        },
        navigate: function () {
            this.isVisible(true);
        },
        navigateToNextStep: function () {
            if (customer.isLoggedIn()) {
                if (this.validateNewEmail()) {
                    this.updateEmail();
                    stepNavigator.next();
                }
            } else {
                if (customerEmailValidator.validate()) {
                    stepNavigator.next();
                }
            }
        },
    });
});

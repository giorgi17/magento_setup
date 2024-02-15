define([
    'uiComponent',
    'ko',
    'Magento_Checkout/js/model/step-navigator',
    'mage/translate',
    'underscore',
    'jquery',
    'mage/validation',
], function (
    Component,
    ko,
    stepNavigator,
    $t,
    _,
    $,
) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Macademy_CustomCheckout/doctor',
            isVisible: ko.observable(false),
            doctorName: ko.observable(),
            doctorPhoneNumber: ko.observable(),
        },
        initialize: function () {
            this._super();

            stepNavigator.registerStep(
                'doctor',
                null,
                $t('Doctor'),
                this.isVisible,
                _.bind(this.navigate, this),
                this.sortOrder,
            );

            return this;
        },
        navigate: function () {
            this.isVisible(true);
        },
        navigateToNextStep: function () {
           // Some validation here
            const formElement = $('.checkout-doctor form');

            // formElement.validate();

            if (formElement.valid()) {
                console.log('doctor', 'Doctor is valid');
                stepNavigator.next();
            } else {
                console.log('doctor', 'Doctor is not valid');
            }

            console.log("formElement", formElement);
        },
    });
});

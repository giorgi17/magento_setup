define([
    'uiComponent',
    'Macademy_InventoryFulfillment/js/model/sku',
    'Macademy_InventoryFulfillment/js/model/box-configurations',
    'ko',
    'mage/url',
    'mage/storage'
], function (
    Component,
    skuModel,
    boxConfigurationsModel,
    ko,
    url,
    storage,
) {
    'use strict';

    return Component.extend({
        defaults: {
            numberOfBoxes: boxConfigurationsModel.numberOfBoxes(),
            shipmentWeight: boxConfigurationsModel.shipmentWeight(),
            billableWeight: boxConfigurationsModel.billableWeight(),
            isTermsChecked: ko.observable(false),
            boxConfigurationsIsSuccess: boxConfigurationsModel.isSuccess,
            boxConfigurations: boxConfigurationsModel.boxConfigurations,
            sku: skuModel.sku,
        },
        initialize() {
            this._super();

            this.canSubmit = ko.computed(() => {
                return skuModel.isSuccess() && boxConfigurationsModel.isSuccess()
                    && this.isTermsChecked();
            });
        },
        handleSubmit() {
            if (this.canSubmit()) {
                console.log("Submit fired");
                storage
                    .post(this.getUrl(), {
                        sku: skuModel.sku,
                        boxConfigurations: ko.toJSON(this.boxConfigurations),
                    })
                    .done(response => console.log("handleSubmit", response))
                    .fail(err => console.log("handleSubmitError", err));
            } else {
                console.log("Submit could not be fired");
            }
        },
        getUrl() {
            return url.build('inventory-fulfillment/index/post');
        },
    });
})

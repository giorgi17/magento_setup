define([
    'uiComponent',
    'ko',
    'Devall_WeatherApp/js/model/city-weather-info',
], function (
    Component,
    ko,
    singleDataDisplayModel,
) {
    'use strict';

    return Component.extend({
        defaults: {
            fetchedData: singleDataDisplayModel
        },
        initialize() {
            this._super();

            console.log("singleDataDisplayModel", this.fetchedData.city());

        },
    })
})

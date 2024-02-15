define([], function () {
    'use strict'

    return function (originalMessages) {
        // First way
        // originalMessages.defaults.hideTimeout = 1000;
        // return originalMessages;

        // Second way
        return originalMessages.extend({
            defaults: {
                hideTimeout: 3000,
                hideSpeed: 100,
            }
        })
    }
})

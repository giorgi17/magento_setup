define([
    'ko'
], function (
    ko
) {
    'use strict';

    ko.bindingHandlers.makeItSwerva = {
        init: function (element, valueAccessor) {
            element.innerHTML = valueAccessor() + ' 🙂';
        },
        update: function (element, valueAccessor) {
        }
    };
})

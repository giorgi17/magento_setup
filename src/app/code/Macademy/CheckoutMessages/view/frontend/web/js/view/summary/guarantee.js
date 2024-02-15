define(['uiComponent'], function (Component) {
    'use strict';

    return Component.extend({
        showMessage: function () {
            return this.subtotal > 100;
        },
        initialize: function () {
            this._super();
            console.log(this.name + ' is initialized.')
        },
    });
});

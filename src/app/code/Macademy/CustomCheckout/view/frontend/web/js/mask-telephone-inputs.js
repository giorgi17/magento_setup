define([
    'domReady',
    'Magento_Ui/js/lib/view/utils/dom-observer',
    'jquery',
    'Macademy_CustomCheckout/js/jquery.inputmask.min'
], function (
    domReady,
    domObserver,
    $
) {
    'use strict';

    console.log("telephone", "Telephone works boiiii");

    // TODO: Not working
    // domReady(function () {
    //     domObserver.get('input[name="telephone"]', function (el) {
    //         $(el).inputmask("(999) 999-9999");
    //     });
    // });

    // TODO: Not working
    domReady(function () {
            domObserver.get('input[name="telephone"]', function (el) {
                $(el).inputmask("(999) 999-9999");
            });

        domObserver.get('input[name="doctor-phone-number"]', function (el) {
            $(el).inputmask("(999) 999-9999");
        });
    });
});

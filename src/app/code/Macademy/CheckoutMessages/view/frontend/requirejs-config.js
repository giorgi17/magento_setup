const config = {
    config: {
        mixins: {
            'Magento_Checkout/js/view/summary/cart-items': {
                'Macademy_CheckoutMessages/js/view/summary/cart-items-mixin': true
            }
        }
    },
    map: {
        // Not a good practice to override template this way!
        '*': {
            'Magento_Checkout/template/sidebar': 'Macademy_CheckoutMessages/template/sidebar'
        }
    }
}

var config = {
    map: {
        '*': {
            'Magento_SalesRule/template/payment/discount.html':
                'Codilar_CouponCode/template/payment/discount.html'
        }
    },
    config: {
        mixins: {
            'Magento_SalesRule/js/view/payment/discount': {
                'Codilar_CouponCode/js/view/payment/discount-mixin': true
            }
        }
    }
};
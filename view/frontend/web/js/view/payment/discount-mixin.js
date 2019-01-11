define(function () {
    'use strict';

    var mixin = {

        /**
         *
         * @return Array
         */
        getCodes: function () {
            return window.checkoutConfig.coupon_codes;
        }
    };

    return function (target) {
        return target.extend(mixin);
    };
});
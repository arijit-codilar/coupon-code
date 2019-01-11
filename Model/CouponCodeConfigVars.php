<?php
/**
 * CouponCodeConfigVars
 *
 * @copyright Copyright © 2019 Codilar Technologies Pvt. Ltd.. All rights reserved.
 * @author    anshu@codilar.com
 */

namespace Codilar\CouponCode\Model;

use \Magento\Checkout\Model\ConfigProviderInterface;

class CouponCodeConfigVars implements ConfigProviderInterface
{
    public function __construct()
    {

    }

    public function getConfig()
    {
        $couponCodes['coupon_codes'] = ['1', 'A'];
        return $couponCodes;
    }
}
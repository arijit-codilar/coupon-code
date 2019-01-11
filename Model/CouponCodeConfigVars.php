<?php
/**
 * CouponCodeConfigVars
 *
 * @copyright Copyright © 2019 Codilar Technologies Pvt. Ltd.. All rights reserved.
 * @author    anshu@codilar.com
 */

namespace Codilar\CouponCode\Model;

use \Magento\Checkout\Model\ConfigProviderInterface;
use \Codilar\CouponCode\Model\CouponFactory;

class CouponCodeConfigVars implements ConfigProviderInterface
{
    private $couponFactory;

    /**
     * CouponCodeConfigVars constructor.
     * @param CouponFactory $couponFactory
     */
    public function __construct(
        CouponFactory $couponFactory
    )
    {
        $this->couponFactory = $couponFactory;
    }

    public function getConfig()
    {
        $couponModel = $this->couponFactory->create();
        $coupons = $couponModel->getCouponCodeList();
        $codes[] = [' '];
        foreach($coupons as $coupon){
            $codes[] = $coupon->getCode();
        }
        $couponCodes['coupon_codes'] = $codes;
        return $couponCodes;
    }
}
<?php
/**
 * Coupon
 *
 * @copyright Copyright © 2019 Codilar Technologies. All rights reserved.
 * @author    arijit@codilar.com
 */

namespace Codilar\CouponCode\Block\Cart;

use Magento\Checkout\Block\Cart\Coupon as BaseCoupon;


/**
 * Class Coupon
 * @package Codilar\CouponCode\Block\Cart
 */
class Coupon extends BaseCoupon
{

    /**
     * @var \Codilar\CouponCode\Model\CouponFactory
     */
    private $couponFactory;

    /**
     * Coupon constructor.
     *
     * @param \Codilar\CouponCode\Model\CouponFactory $couponFactory
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Customer\Model\Session $customerSession
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param array $data
     */
    public function __construct(
        \Codilar\CouponCode\Model\CouponFactory $couponFactory,
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Checkout\Model\Session $checkoutSession,
        array $data = []
    ) {
        $this->couponFactory = $couponFactory;
        parent::__construct(
            $context,
            $customerSession,
            $checkoutSession,
            $data
        );
    }

    /**
     * Get Coupon Codes
     *
     * @return array
     */
    public function getCouponCodes()
    {
        return $this->couponFactory->create()->getCouponCodeList();
    }

}
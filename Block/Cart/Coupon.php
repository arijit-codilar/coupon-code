<?php
/**
 * Coupon
 *
 * @copyright Copyright © 2019 Codilar Technologies. All rights reserved.
 * @author    arijit@codilar.com
 */

namespace Codilar\CouponCode\Block\Cart;

use Magento\Checkout\Block\Cart\Coupon as BaseCoupon;
use Magento\SalesRule\Model\RuleFactory;
use Magento\SalesRule\Model\Utility;


/**
 * Class Coupon
 * @package Codilar\CouponCode\Block\Cart
 */
class Coupon extends BaseCoupon
{

    /**
     * @var CouponCollectionFactory
     */
    private $couponCollectionFactory;

    /**
     * Coupon constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Customer\Model\Session $customerSession
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param array $data
     */
    public function __construct(
        RuleFactory $ruleFactory,
        \Codilar\CouponCode\Model\CouponFactory $couponFactory,
        Utility $salesUtility,
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Checkout\Model\Session $checkoutSession,
        array $data = []
    ) {
        $this->ruleFactory = $ruleFactory;
        $this->couponFactory = $couponFactory;
        $this->salesUtility = $salesUtility;
        parent::__construct(
            $context,
            $customerSession,
            $checkoutSession,
            $data
        );
    }

    /**
     *
     */
    public function getCouponCodeList()
    {
        return $this->couponFactory->create()->getCouponCodeList();
    }

}
<?php
/**
 * Coupon
 *
 * @copyright Copyright © 2019 Codilar Technologies. All rights reserved.
 * @author    arijit@codilar.com
 */

namespace Codilar\CouponCode\Model;

use Magento\SalesRule\Model\ResourceModel\Coupon\CollectionFactory as CouponCollectionFactory;
use Magento\SalesRule\Model\RuleFactory;
use Magento\SalesRule\Model\Utility;
use Magento\Checkout\Model\Session;

/**
 * Class Coupon
 * @package Codilar\CouponCode\Model
 */
class Coupon
{
    /**
     * @var
     */
    private $couponCodeList;
    /**
     * @var CouponCollectionFactory
     */
    private $couponCollectionFactory;
    /**
     * @var RuleFactory
     */
    private $ruleFactory;
    /**
     * @var Utility
     */
    private $salesUtility;
    /**
     * @var Session
     */
    private $checkoutSession;

    /**
     * Coupon constructor.
     * @param CouponCollectionFactory $couponCollectionFactory
     * @param RuleFactory $ruleFactory
     * @param Utility $salesUtility
     * @param Session $checkoutSession
     */
    public function __construct(
        CouponCollectionFactory $couponCollectionFactory,
        RuleFactory $ruleFactory,
        Utility $salesUtility,
        Session $checkoutSession
    )
    {
        $this->couponCollectionFactory = $couponCollectionFactory;
        $this->ruleFactory = $ruleFactory;
        $this->salesUtility = $salesUtility;
        $this->checkoutSession = $checkoutSession;
    }

    /**
     * Get applicable Coupon Codes
     * 
     * @return array
     */
    public function getCouponCodeList()
    {
        if (!$this->couponCodeList) {
            $couponCollection = $this->couponCollectionFactory->create();
            $this->couponCodeList = $couponCollection;
        }
        $address = $this->checkoutSession->getQuote()->getShippingAddress();
        $couponCodes = [];

        foreach ($this->couponCodeList as $coupon) {
            $rule = $this->ruleFactory->create()->load($coupon->getRuleId());
            $canProcess = $this->salesUtility->canProcessRule($rule, $address);
            if (!$canProcess) {
                continue;
            }
            $couponCodes[] = $coupon;
        }
        return $couponCodes;
    }

}
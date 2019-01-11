<?php
/**
 * Coupon
 *
 * @copyright Copyright © 2019 Codilar Technologies. All rights reserved.
 * @author    arijit@codilar.com
 */

namespace Codilar\CouponCode\Model;

use Magento\SalesRule\Model\ResourceModel\Coupon\CollectionFactory as CouponCollectionFactory;


class Coupon extends \Magento\SalesRule\Model\Coupon
{
    public function __construct(
        CouponCollectionFactory $couponCollectionFactory
    )
    {
        $this->couponCollectionFactory = $couponCollectionFactory;
    }

    public function getCouponCodeList()
    {
        $couponCollection = $this->couponCollectionFactory->create();
        /*$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/coupon.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $address = $this->getQuote()->getShippingAddress();
        $rule = $this->ruleFactory->create()->load(4);
        $canProcess = $this->salesUtility->canProcessRule($rule, $address);
        $logger->info($rule->getCouponCode());
        $logger->info($canProcess);
        foreach ($couponCollection as $coupon) {
            ;
        }*/
        return $couponCollection;
    }

}
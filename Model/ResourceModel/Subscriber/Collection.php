<?php
namespace My\Subscription\Model\ResourceModel\Subscriber;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use My\Subscription\Model\Subscriber as SubscriberModel;
use My\Subscription\Model\ResourceModel\Subscriber as SubscriberResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(SubscriberModel::class, SubscriberResourceModel::class);
    }
}

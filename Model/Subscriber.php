<?php
namespace My\Subscription\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Webapi\Rest\Request;
use My\Subscription\Api\SubscriberInterface;
use My\Subscription\Model\ResourceModel\Subscriber as SubscriberResourceModel;

class Subscriber extends AbstractModel implements SubscriberInterface
{
    const CACHE_TAG = 'subscription_cache_tag';
    protected $_cacheTag = 'subscription_cache_tag';
    protected $_eventPrefix = 'subscription_cache_tag';

    protected function _construct()
    {
        $this->_init(SubscriberResourceModel::class);
    }

    public function create($name, $description)
    {
        return 'Hello : ' . 'ABCDEF';
    }

    public function update($name)
    {
        return 'hellow ' . $name;
    }
}

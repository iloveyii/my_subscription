<?php
namespace My\Subscription\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use My\Subscription\Model\SubscriberFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    protected $subscriberFactory;
    public function __construct(Context $context, PageFactory $resultPageFactory, SubscriberFactory $subscriberFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->subscriberFactory = $subscriberFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $subscriber = $this->subscriberFactory->create();
        $collection = $subscriber->getCollection();
        foreach ($collection as $item) {
            echo '<pre>';
            print_r($item->getData());
            echo '</pre>';
        }
        exit();
    }
}

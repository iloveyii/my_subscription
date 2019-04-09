<?php
namespace My\Subscription\Model\Repository;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Newsletter\Model\ResourceModel\Subscriber;
use Magento\Newsletter\Model\SubscriberFactory;
use Magento\Setup\Exception;
use Magento\Framework\Exception\ValidatorException;
use Magento\Framework\Exception\StateException;
use My\Subscription\Api\Data\SubscriptionInterface;
use My\Subscription\Api\SubscriptionRepositoryInterface;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{
    protected $_instances = [];
    protected $_resource;
    protected $_factory;

    public function __construct(
        Subscriber $resource,
        SubscriberFactory $factory
    ) {
        $this->_resource = $resource;
        $this->_factory = $factory;
    }

    /**
     * @param SubscriptionInterface $object
     * @return SubscriptionInterface|void
     * @throws CouldNotSaveException
     */
    public function save(SubscriptionInterface $object)
    {
        try {
            $this->_resource->save($object);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the record: %1',
                $exception->getMessage()
            ));
        }
    }

    /**
     * @param int $id
     * @return bool|void
     */
    public function getById($id)
    {
        if (!isset($this->_instances[$id])) {
            /** @var SubscriptionInterface|\Magento\Framework\Model\AbstractModel $object */
            $object = $this->_factory->create();
            $this->_resource->load($object, $id);
            if (!$object->getId()) {
                throw new NoSuchEntityException(__('Data does not exist'));
            }
            $this->_instances[$id] = $object;
        }
        return $this->_instances[$id];
    }

    /**
     * @param SubscriptionInterface $object
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     * @throws \Magento\Framework\Exception\LocalizedException
     * @return bool|void
     */
    public function delete(SubscriptionInterface $object)
    {
        /** @var SubscriptionInterface|\Magento\Framework\Model\AbstractModel $object */
        $id = $object->getId();
        try {
            unset($this->_instances[$id]);
            $this->_resource->delete($object);
        } catch (ValidatorException $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        } catch (Exception $e) {
            throw new StateException(
                __('Unable to remove %1', $id)
            );
        }
        unset($this->_instances[$id]);
        return true;
    }

    /**
     * Delete data by ID.
     *
     * @param int $id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id)
    {
        return $this->delete($this->getById($id));
    }
}

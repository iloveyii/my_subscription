<?php
namespace My\Subscription\Api;

use My\Subscription\Api\Data\SubscriptionInterface;

interface SubscriptionRepositoryInterface
{
    /**
     * Save record
     *
     * @param SubscriptionInterface $object
     * @return SubscriptionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(SubscriptionInterface $object);

    /**
     * Retrieve record
     *
     * @param int $id
     * @return SubscriptionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($id);

    /**
     * Delete record
     *
     * @param SubscriptionInterface $object
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(SubscriptionInterface $object);

    /**
     * Delete record by id
     *
     * @param int $id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
}

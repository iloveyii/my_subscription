<?php
namespace My\Subscription\Api\Data;

interface SubscriptionInterface
{
    const ID = 'id';
    const NAME = 'name';
    const DESCRIPTION = 'description';

    /**
     * @return int|null
     */
    public function getId();

    /**
     * @return string|null
     */
    public function getName();

    /**
     * @return string|null
     */
    public function getDescription();

    /**
     * @param int $id
     * @return mixed
     */
    public function setId($id);

    /**
     * @param string $name
     * @return mixed
     */
    public function setName($name);

    /**
     * @param string $description
     * @return mixed
     */
    public function setDescription($description);
}

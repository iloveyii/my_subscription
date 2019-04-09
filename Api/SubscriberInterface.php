<?php
namespace My\Subscription\Api;

interface SubscriberInterface
{

    /**
     * @param $name
     * @param $description
     * @return mixed
     */
    public function create($name, $description);

    /**
     * @param $name
     * @return mixed
     */
    public function update($name);
}

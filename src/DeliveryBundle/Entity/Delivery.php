<?php

namespace DeliveryBundle\Entity;

use CommonBundle\Entity\Product\Product;

class Delivery
{
    public $id;

    public $address;

    /** @var Product[] */
    public $products;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Delivery
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}

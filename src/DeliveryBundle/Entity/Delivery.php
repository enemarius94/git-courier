<?php

namespace DeliveryBundle\Entity;

use CommonBundle\Entity\Product\Product;

class Delivery
{
    /** @var int $id */
    public $id;

    /** @var string $address */
    public $address;

    /** @var Product[] */
    public $products;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Delivery
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Delivery
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Product[] $products
     * @return Delivery
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }
}
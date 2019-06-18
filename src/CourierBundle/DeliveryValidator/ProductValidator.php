<?php

namespace CourierBundle\DeliveryValidator;

use CommonBundle\Entity\Product\Product;
use CourierBundle\DeliveryValidator\Exception\DeliveryNotSupported;

class ProductValidator
{
    public function validateProductType(Product $product, $type)
    {
        if ($product->type !== $type) {
            throw new DeliveryNotSupported();
        }
    }

    public function validateProductWeight(Product $product, $weight)
    {
        if ($product->weight > $weight) {
            throw new DeliveryNotSupported();
        }
    }

    public function validateProductDimensions(Product $product, $maxLength)
    {
        $dimmensions = [$product->length, $product->width, $product->height];
        rsort($dimmensions);
        list($length, $width, $height) = $dimmensions;

        if ($length > $maxLength) {
            throw new DeliveryNotSupported();
        }
    }

    public function validateProductsVolume($productVolume, $deliveryVolume)
    {
        if ($productVolume > $deliveryVolume) {
            throw new DeliveryNotSupported();
        }
    }
}

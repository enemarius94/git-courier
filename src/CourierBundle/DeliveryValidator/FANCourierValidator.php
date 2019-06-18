<?php

namespace CourierBundle\DeliveryValidator;

use CommonBundle\Entity\Product\Product;
use CourierBundle\DeliveryValidator\Exception\DeliveryNotSupported;
use DeliveryBundle\Entity\Delivery;

class FANCourierValidator
{
    const MAX_WEIGHT = 40000;
    const MAX_PRODUCT_LENGTH = 2000;
    const MAX_DELIVERY_VOLUME = 1000000000;

    /** @var ProductValidator */
    private $productValidator;

    /**
     * CargusCourierValidator constructor.
     * @param ProductValidator $productValidator
     */
    public function __construct(ProductValidator $productValidator)
    {
        $this->productValidator = $productValidator;
    }

    public function supportsDelivery(Delivery $delivery)
    {
        $maxLength = 0;
        $maxWidth = 0;
        $maxHeight = 0;

        foreach ($delivery->products as $product) {
            $this->productValidator->validateProductType($product, Product::DRY);
            $this->productValidator->validateProductWeight($product, self::MAX_WEIGHT);
            $this->productValidator->validateProductDimensions($product, self::MAX_PRODUCT_LENGTH);

            $maxLength = max($maxLength, $product->length);
            $maxWidth = max($maxWidth, $product->width);
            $maxHeight += $product->height;
        }

        $totalVolume = $maxLength*$maxWidth*$maxHeight;
        $this->productValidator->validateProductsVolume($totalVolume, self::MAX_DELIVERY_VOLUME);
    }
}

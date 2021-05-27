<?php

namespace Acn\BasketLimiter\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\LocalizedException;

class LimitQtyCart implements ObserverInterface
{

    public function execute(Observer $observer)
    {

        /** @var \Magento\Quote\Api\Data\CartItemInterface $quoteItem  */

        $quoteItem = $observer->getQuoteItem();

        $typeItem = $quoteItem->getProductType();


        if ($typeItem != "bundle") {
                 return;
    }

        /** @var \Magento\Catalog\Api\Data\ProductInterface $bundleProduct */
        $bundleProduct = $quoteItem->getProduct();


        $addedQuantity = 0;



        $bundleExpectedQty = (int) $bundleProduct->getData('basket_size');

         /**
          * se não existir um valor para validar, não faz nada
          */
        if (!$bundleExpectedQty) {
            return;
        }


        $bundleItems = $quoteItem->getChildren();


        /** @var \Magento\Quote\Api\Data\CartItemInterface $item */
        foreach ($bundleItems as $item) {
            $addedQuantity = $addedQuantity + $item->getQty();
        }


             /**
              * comparem os dois valores (qtd adicionada ao carrinho X quantidade esperada)
              */
        if ($addedQuantity > $bundleExpectedQty) {

            throw new LocalizedException(__('The items purchased exceed the size of the basket.'));
        }
    }
}

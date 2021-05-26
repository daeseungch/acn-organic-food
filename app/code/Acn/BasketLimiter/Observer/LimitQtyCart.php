<?php

namespace Acn\Compras\Observer;

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

        /**
         * @todo 1. verificar se o quote item (item do carrinho) é do tipo bundle. se não for bundle: retorna. usem o objeto $quoteItem para verificar isso
         */
        if ($typeItem != "bundle") {
                 return;
    }

        /** @var \Magento\Catalog\Api\Data\ProductInterface $bundleProduct */
        $bundleProduct = $quoteItem->getProduct();
        /**
         * inicializado a variável que vamos usar para validar a quantidade
         */
        $addedQuantity = 0;


        /**
         * @todo 2. alterem aqui.. vocês precisam saber o número de itens da cesta para validar isso
         */
        $bundleExpectedQty = (int) $bundleProduct->getData('basket_size');

         /**
          * se não existir um valor para validar, não faz nada
          */
        if (!$bundleExpectedQty) {
            return;
        }


         /**
          * @todo 3. peguem os itens do bundle. usem o objeto $quoteItem para isso
          */
        $bundleItems = $quoteItem->getChildren();



        /*
         * @todo 4. adicionar a quantidade do item filho do bundle adicionada ao carrinho na variável $addedQuantity
         */
        /** @var \Magento\Quote\Api\Data\CartItemInterface $item */
        foreach ($bundleItems as $item) {
            $addedQuantity = $addedQuantity + $item->getQty();
        }


             /**
              * comparem os dois valores (qtd adicionada ao carrinho X quantidade esperada)
              */
        if ($addedQuantity > $bundleExpectedQty) {
            /**
             * @todo 5. disparem a mensagem da exceção de vocês :)
             */
            throw new LocalizedException(__('The items purchased exceed the size of the basket.'));
        }
    }
}

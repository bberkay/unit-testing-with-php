<?php

namespace src;

use src\models\Product;

class ShoppingCart{
    private array $products = [];

    /**
     * Add a product to the shopping cart
     */
    public function addProduct(Product $product): void
    {
        if($product->getStock() > 0){
            $this->products[] = $product;

            // Decrease the stock of the product
            $product->setStock($product->getStock() - 1);
        }else{
            throw new \InvalidArgumentException('Product is out of stock');
        }
    }

    /**
     * Get the total price of the shopping cart
     */
    public function getTotalPrice(): float
    {
        $total = 0;
        foreach($this->products as $product){
            $total += $product->getPrice();
        }
        return $total;
    }

    /**
     * Get the products in the shopping cart
     */
    public function getProducts(): array
    {
        return $this->products;
    }
}
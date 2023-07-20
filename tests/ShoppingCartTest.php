<?php

use src\ShoppingCart;
use src\models\Product;

use PHPUnit\Framework\TestCase;

class ShoppingCartTest extends TestCase
{
    /**
     * Test add product
     */
    public function testAddProduct(){
        $product1 = new Product('Laptop', 1000, 100);
        $product2 = new Product('Phone', 1500, 5);

        $shoppingCart = new ShoppingCart();
        $shoppingCart->addProduct($product1);
        $shoppingCart->addProduct($product2);

        $this->assertCount(2, $shoppingCart->getProducts());
    }

    /**
     * Test positive numbers
     */
    public function testGetTotalPrice(){
        $product1 = new Product('Laptop', 1000, 100);
        $product2 = new Product('Phone', 1500, 5);

        $shoppingCart = new ShoppingCart();
        $shoppingCart->addProduct($product1);
        $shoppingCart->addProduct($product2);

        $this->assertEquals(2500, $shoppingCart->getTotalPrice());
    }

    /**
     * Test stock of product
     */
    public function testStockOfProduct()
    {
        $product1 = new Product('Laptop', 1000, 100);
        $product2 = new Product('Phone', 1500, 5);

        $shoppingCart = new ShoppingCart();
        $shoppingCart->addProduct($product1);
        $shoppingCart->addProduct($product2);

        $this->assertEquals(99, $product1->getStock());
        $this->assertEquals(4, $product2->getStock());
    }

    /**
     * Test negative stock of product
     */
    public function testNegativeStockOfProduct()
    {
        $product1 = new Product('Laptop', 1000, 0);

        $shoppingCart = new ShoppingCart();
        $shoppingCart->addProduct($product1);

        $this->expectException(InvalidArgumentException::class);
    }

}

// Run the test with 'vendor/bin/phpunit' command
// and you will see the following output like this:

/**
 * Output:
 * -------
 * There was 1 error:
 *
 * 1) ShoppingCartTest::testNegativeStockOfProduct
 * InvalidArgumentException: Product is out of stock
 *
 * ERRORS!
 * Tests: 4, Assertions: 4, Errors: 1.
 */

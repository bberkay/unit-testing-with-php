<?php
namespace src\models;

class Product{

    private string $name;
    private float $price;
    private int $stock;

    public function __construct(string $name, float $price, int $stock = 0)
    {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    /**
     * Getters
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * Setters
     */
    public function setStock($stock): void
    {
        $this->stock = $stock;
    }

    public function addStock($stock): void
    {
        $this->stock += $stock;
    }

    public function removeStock($stock): void
    {
        $this->stock -= $stock;
    }
}
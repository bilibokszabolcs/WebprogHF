<?php


class CartItem
{
    private Product $product;
    private int $quantity;

    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function increaseQuantity()
    {
        $this->quantity += 1;
    }

    public function decreaseQuantity()
    {
        if ($this->getQuantity() - 1 > 1) {
            $this->setQuantity($this->quantity - 1);
        }
    }
}
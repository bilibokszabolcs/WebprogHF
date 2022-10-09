<?php


class Cart
{

    private array $items = [];


    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    public function addProduct(Product $product, int $quantity): CartItem
    {
        $cartItem = new CartItem($product, $quantity);

        if (in_array($cartItem, $this->items)) {

            $oldQuantity = $this->items[$product->getId()]->getQuantity();

            if ($oldQuantity + $quantity < $product->getAvailableQuantity()) {
                $this->items[$product->getId()]->setQuantity($oldQuantity + $quantity);
            }
        } else {
            $this->items[$product->getId()] = $cartItem;
        }
        return $cartItem;
    }

    public function removeProduct(Product $product)
    {
        $this->items[$product->getId()]->decreaseQuantity();

    }

    public function getTotalQuantity(): int
    {
        $totalQuantity = 0;

        foreach ($this->items as $item) {
            $totalQuantity = $totalQuantity + $item->getQuantity();
        }
        return $totalQuantity;
    }

    public function getTotalSum(): float
    {
        $totalSum = 0;

        foreach ($this->items as $item) {
            $totalSum = $totalSum + ($item->getQuantity() * $item->getProduct()->getPrice());
        }
        return $totalSum;
    }
}
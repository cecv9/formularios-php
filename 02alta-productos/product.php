<?php

final class Product
{
    public function __construct(
        private readonly string $name,
        private readonly float $price,
        private readonly string $description,
        private readonly string $image,
    ){}

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getImage(): string
    {
        return $this->image;
    }
}

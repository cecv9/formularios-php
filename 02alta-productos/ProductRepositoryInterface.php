<?php

interface ProductRepositoryInterface
{
    public function create(Product $product): bool;
}

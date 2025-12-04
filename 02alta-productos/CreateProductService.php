<?php

final class CreateProductService
{

    public function __construct(private readonly ProductRepositoryInterface $productRepository){}

    public function create(Product $product): bool{
        return $this->productRepository->create($product);
    }

}

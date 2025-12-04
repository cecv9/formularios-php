<?php

final class CreateProductPDO implements ProductRepositoryInterface
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = new PDO('mysql:host=localhost;dbname=products', 'root', '123');

        $this->connection->exec('
            CREATE TABLE IF NOT EXISTS products (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                price FLOAT NOT NULL,
                description TEXT NOT NULL,
                image VARCHAR(255) NOT NULL
            )
        ');
    }

    public function create(Product $product): bool
    {
        $statement = $this->connection->prepare('
            INSERT INTO products (name, price, description, image)
            VALUES (:name, :price, :description, :image)
        ');

        $statement->execute([
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'description' => $product->getDescription(),
            'image' => $product->getImage(),
        ]);

        return $statement->rowCount() > 0;
    }
}

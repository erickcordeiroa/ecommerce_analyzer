<?php 

namespace App\Domains\Entities;

class Product
{
    private ?string $description;
    private ?string $imageUrl;

    public function __construct(
        private readonly string $title, 
        private readonly string $price,
        private readonly string $productUrl,
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getProductUrl(): string
    {
        return $this->productUrl;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setImageUrl(string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->getTitle(),
            'price' => $this->getPrice(),
            'productUrl' => $this->getProductUrl(),
            'imageUrl' => $this->getImageUrl(),
            'description' => $this->getDescription(),
        ];
    }

}
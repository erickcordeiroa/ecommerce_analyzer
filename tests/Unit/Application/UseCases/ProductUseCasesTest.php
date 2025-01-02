<?php

namespace Tests\Unit;

use App\Application\UseCases\ProductUseCase;
use App\Domains\Entities\Product;
use App\Domains\Repositories\ProductRepositoryInterface;
use Faker\Factory as FakerFactory;
use PHPUnit\Framework\TestCase;

class ProductUseCasesTest extends TestCase
{

    private $faker;
    private $productRepositoryMock;
    private $productUseCase;

    public function setUp(): void
    {
        parent::setUp();

        $this->faker = FakerFactory::create();
        $this->productRepositoryMock = $this->createMock(ProductRepositoryInterface::class);
        $this->productUseCase = new ProductUseCase($this->productRepositoryMock);
    }

    public function test_execute_function()
    {
        $product = new Product(
            $this->faker->word(),
            $this->faker->randomFloat(2, 0, 1000),
            $this->faker->url()
        );

        $this->productRepositoryMock->expects($this->once())
            ->method('create')
            ->with($product)
            ->willReturn($product);

        $result = $this->productUseCase->execute($product);
        $this->assertSame($product, $result);
    }

}

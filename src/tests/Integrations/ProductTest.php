<?php


namespace Tests\Integrations;

use App\Models\Product;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Symfony\Component\HttpFoundation\Response;
use TestCase;

/**
 * Class ProductTest
 * @package Tests\Integrations
 */
class ProductTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * @test
     */
    public function shouldReturnListOfproducts()
    {
        factory(Product::class)->create();

        $this->get("/v1/products");

        $this->seeJsonStructure(
            [
                "data",
                "meta" => [
                    "pagination" => [
                        "total",
                        "count",
                        "per_page",
                        "current_page",
                        "total_pages",
                        "links"
                    ]
                ],
            ]
        );

        $this->assertResponseOk();
    }

    /**
     * @test
     */
    public function shouldReturnAProduct()
    {
        $product = factory(Product::class)->create();

        $this->get("/v1/products/$product->_id");

        $this->seeJsonStructure(
            [
                "description",
                "price"
            ]
        );

        $this->assertResponseOk();
    }


    /**
     * @test
     */
    public function shouldAddProduct()
    {
        $product = factory(Product::class)->make()->toArray();

        $response = $this->post("/v1/products", $product);

        $this->seeJsonStructure(
            [
                "inserted_id"
            ]
        );

        $result = json_decode($response->response->getContent());

        $this->seeInDatabase('products', ['_id' => $result->inserted_id]);
        $this->assertResponseStatus(Response::HTTP_CREATED);
    }

    /**
     * @test
     */
    public function shouldUpdateProduct()
    {
        $product = factory(Product::class)->create();

        $this->put("/v1/products/{$product->_id}", ["description" => "Update Teste"]);

        $this->seeInDatabase('products', ['description' => "Update Teste"]);
        $this->assertResponseStatus(Response::HTTP_NO_CONTENT);
    }

    /**
     * @test
     */
    public function shouldRemoveProduct()
    {
        $product = factory(Product::class)->create();

        $this->delete("/v1/products/".$product->_id);

        $this->notSeeInDatabase('products', ['_id' => $product->_id]);
        $this->assertResponseStatus(Response::HTTP_NO_CONTENT);
    }


    /**
     * @test
     */
    public function shoudReturnNotFoundErrorWhenProductDoNotExists()
    {
        $id = "not_exists_id";
        $this->get("/v1/products/{$id}");

        $this->assertResponseStatus(Response::HTTP_NOT_FOUND);
    }
}

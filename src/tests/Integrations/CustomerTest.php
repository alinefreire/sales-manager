<?php


namespace Tests\Integrations;

use App\Models\Customer;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Symfony\Component\HttpFoundation\Response;
use TestCase;

/**
 * Class CustomerTest
 * @package Tests\Integrations
 */
class CustomerTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * @test
     */
    public function shouldReturnListOfCustomers()
    {
        factory(Customer::class)->create();

        $this->get("/v1/customers");

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
    public function shouldReturnACustomer()
    {
        $customer = factory(Customer::class)->create();

        $this->get("/v1/customers/$customer->_id");

        $this->seeJsonStructure(
            [
                "name",
                "email",
                "phone_number",
                "address" => [
                    "city",
                    "state",
                    "street",
                    "number",
                    "postal_code",
                    "neighborhood"
                ],
            ]
        );

        $this->assertResponseOk();
    }


    /**
     * @test
     */
    public function shouldAddCustomer()
    {
        $customer = factory(Customer::class)->make()->toArray();

        $response = $this->post("/v1/customers", $customer);

        $this->seeJsonStructure(
            [
                "inserted_id"
            ]
        );

        $result = json_decode($response->response->getContent());

        $this->seeInDatabase('customers', ['_id' => $result->inserted_id]);
        $this->assertResponseStatus(Response::HTTP_CREATED);
    }

    /**
     * @test
     */
    public function shouldUpdateCustomer()
    {
        $customer = factory(Customer::class)->create();

        $this->put("/v1/customers/{$customer->_id}",["name" => "Update Teste"]);

        $this->seeInDatabase('customers', ['name' => "Update Teste"]);
        $this->assertResponseStatus(Response::HTTP_NO_CONTENT);
    }

    /**
     * @test
     */
    public function shouldRemoveCustomer()
    {
        $customer = factory(Customer::class)->create();

        $this->delete("/v1/customers/".$customer->_id);

        $this->notSeeInDatabase('customers', ['_id' => $customer->_id]);
        $this->assertResponseStatus(Response::HTTP_NO_CONTENT);
    }


    /**
     * @test
     */
    public function shoudReturnNotFoundErrorWhenCustomerDoNotExists()
    {
        $id = "not_exists_id";
        $this->get("/v1/customers/{$id}");

        $this->assertResponseStatus(Response::HTTP_NOT_FOUND);
    }
}

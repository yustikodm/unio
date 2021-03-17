<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Printer;

class PrinterApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_printer()
    {
        $printer = factory(Printer::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/printer', $printer
        );

        $this->assertApiResponse($printer);
    }

    /**
     * @test
     */
    public function test_read_printer()
    {
        $printer = factory(Printer::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/printer/'.$printer->id
        );

        $this->assertApiResponse($printer->toArray());
    }

    /**
     * @test
     */
    public function test_update_printer()
    {
        $printer = factory(Printer::class)->create();
        $editedPrinter = factory(Printer::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/printer/'.$printer->id,
            $editedPrinter
        );

        $this->assertApiResponse($editedPrinter);
    }

    /**
     * @test
     */
    public function test_delete_printer()
    {
        $printer = factory(Printer::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/printer/'.$printer->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/printer/'.$printer->id
        );

        $this->response->assertStatus(404);
    }
}

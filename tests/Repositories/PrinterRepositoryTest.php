<?php namespace Tests\Repositories;

use App\Models\Printer;
use App\Repositories\PrinterRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PrinterRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PrinterRepository
     */
    protected $printerRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->printerRepo = \App::make(PrinterRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_printer()
    {
        $printer = factory(Printer::class)->make()->toArray();

        $createdPrinter = $this->printerRepo->create($printer);

        $createdPrinter = $createdPrinter->toArray();
        $this->assertArrayHasKey('id', $createdPrinter);
        $this->assertNotNull($createdPrinter['id'], 'Created Printer must have id specified');
        $this->assertNotNull(Printer::find($createdPrinter['id']), 'Printer with given id must be in DB');
        $this->assertModelData($printer, $createdPrinter);
    }

    /**
     * @test read
     */
    public function test_read_printer()
    {
        $printer = factory(Printer::class)->create();

        $dbPrinter = $this->printerRepo->find($printer->id);

        $dbPrinter = $dbPrinter->toArray();
        $this->assertModelData($printer->toArray(), $dbPrinter);
    }

    /**
     * @test update
     */
    public function test_update_printer()
    {
        $printer = factory(Printer::class)->create();
        $fakePrinter = factory(Printer::class)->make()->toArray();

        $updatedPrinter = $this->printerRepo->update($fakePrinter, $printer->id);

        $this->assertModelData($fakePrinter, $updatedPrinter->toArray());
        $dbPrinter = $this->printerRepo->find($printer->id);
        $this->assertModelData($fakePrinter, $dbPrinter->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_printer()
    {
        $printer = factory(Printer::class)->create();

        $resp = $this->printerRepo->delete($printer->id);

        $this->assertTrue($resp);
        $this->assertNull(Printer::find($printer->id), 'Printer should not exist in DB');
    }
}

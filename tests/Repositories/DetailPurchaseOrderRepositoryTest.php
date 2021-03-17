<?php namespace Tests\Repositories;

use App\Models\DetailPurchaseOrder;
use App\Repositories\DetailPurchaseOrderRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DetailPurchaseOrderRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DetailPurchaseOrderRepository
     */
    protected $detailPurchaseOrderRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->detailPurchaseOrderRepo = \App::make(DetailPurchaseOrderRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_detail_purchase_order()
    {
        $detailPurchaseOrder = factory(DetailPurchaseOrder::class)->make()->toArray();

        $createdDetailPurchaseOrder = $this->detailPurchaseOrderRepo->create($detailPurchaseOrder);

        $createdDetailPurchaseOrder = $createdDetailPurchaseOrder->toArray();
        $this->assertArrayHasKey('id', $createdDetailPurchaseOrder);
        $this->assertNotNull($createdDetailPurchaseOrder['id'], 'Created DetailPurchaseOrder must have id specified');
        $this->assertNotNull(DetailPurchaseOrder::find($createdDetailPurchaseOrder['id']), 'DetailPurchaseOrder with given id must be in DB');
        $this->assertModelData($detailPurchaseOrder, $createdDetailPurchaseOrder);
    }

    /**
     * @test read
     */
    public function test_read_detail_purchase_order()
    {
        $detailPurchaseOrder = factory(DetailPurchaseOrder::class)->create();

        $dbDetailPurchaseOrder = $this->detailPurchaseOrderRepo->find($detailPurchaseOrder->id);

        $dbDetailPurchaseOrder = $dbDetailPurchaseOrder->toArray();
        $this->assertModelData($detailPurchaseOrder->toArray(), $dbDetailPurchaseOrder);
    }

    /**
     * @test update
     */
    public function test_update_detail_purchase_order()
    {
        $detailPurchaseOrder = factory(DetailPurchaseOrder::class)->create();
        $fakeDetailPurchaseOrder = factory(DetailPurchaseOrder::class)->make()->toArray();

        $updatedDetailPurchaseOrder = $this->detailPurchaseOrderRepo->update($fakeDetailPurchaseOrder, $detailPurchaseOrder->id);

        $this->assertModelData($fakeDetailPurchaseOrder, $updatedDetailPurchaseOrder->toArray());
        $dbDetailPurchaseOrder = $this->detailPurchaseOrderRepo->find($detailPurchaseOrder->id);
        $this->assertModelData($fakeDetailPurchaseOrder, $dbDetailPurchaseOrder->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_detail_purchase_order()
    {
        $detailPurchaseOrder = factory(DetailPurchaseOrder::class)->create();

        $resp = $this->detailPurchaseOrderRepo->delete($detailPurchaseOrder->id);

        $this->assertTrue($resp);
        $this->assertNull(DetailPurchaseOrder::find($detailPurchaseOrder->id), 'DetailPurchaseOrder should not exist in DB');
    }
}

<?php namespace Tests\Repositories;

use App\Models\TipeParameter;
use App\Repositories\TipeParameterRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TipeParameterRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TipeParameterRepository
     */
    protected $tipeParameterRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipeParameterRepo = \App::make(TipeParameterRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tipe_parameter()
    {
        $tipeParameter = factory(TipeParameter::class)->make()->toArray();

        $createdTipeParameter = $this->tipeParameterRepo->create($tipeParameter);

        $createdTipeParameter = $createdTipeParameter->toArray();
        $this->assertArrayHasKey('id', $createdTipeParameter);
        $this->assertNotNull($createdTipeParameter['id'], 'Created TipeParameter must have id specified');
        $this->assertNotNull(TipeParameter::find($createdTipeParameter['id']), 'TipeParameter with given id must be in DB');
        $this->assertModelData($tipeParameter, $createdTipeParameter);
    }

    /**
     * @test read
     */
    public function test_read_tipe_parameter()
    {
        $tipeParameter = factory(TipeParameter::class)->create();

        $dbTipeParameter = $this->tipeParameterRepo->find($tipeParameter->id);

        $dbTipeParameter = $dbTipeParameter->toArray();
        $this->assertModelData($tipeParameter->toArray(), $dbTipeParameter);
    }

    /**
     * @test update
     */
    public function test_update_tipe_parameter()
    {
        $tipeParameter = factory(TipeParameter::class)->create();
        $fakeTipeParameter = factory(TipeParameter::class)->make()->toArray();

        $updatedTipeParameter = $this->tipeParameterRepo->update($fakeTipeParameter, $tipeParameter->id);

        $this->assertModelData($fakeTipeParameter, $updatedTipeParameter->toArray());
        $dbTipeParameter = $this->tipeParameterRepo->find($tipeParameter->id);
        $this->assertModelData($fakeTipeParameter, $dbTipeParameter->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tipe_parameter()
    {
        $tipeParameter = factory(TipeParameter::class)->create();

        $resp = $this->tipeParameterRepo->delete($tipeParameter->id);

        $this->assertTrue($resp);
        $this->assertNull(TipeParameter::find($tipeParameter->id), 'TipeParameter should not exist in DB');
    }
}

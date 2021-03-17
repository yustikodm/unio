<?php namespace Tests\Repositories;

use App\Models\Parameter;
use App\Repositories\ParameterRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ParameterRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ParameterRepository
     */
    protected $parameterRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->parameterRepo = \App::make(ParameterRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_parameter()
    {
        $parameter = factory(Parameter::class)->make()->toArray();

        $createdParameter = $this->parameterRepo->create($parameter);

        $createdParameter = $createdParameter->toArray();
        $this->assertArrayHasKey('id', $createdParameter);
        $this->assertNotNull($createdParameter['id'], 'Created Parameter must have id specified');
        $this->assertNotNull(Parameter::find($createdParameter['id']), 'Parameter with given id must be in DB');
        $this->assertModelData($parameter, $createdParameter);
    }

    /**
     * @test read
     */
    public function test_read_parameter()
    {
        $parameter = factory(Parameter::class)->create();

        $dbParameter = $this->parameterRepo->find($parameter->id);

        $dbParameter = $dbParameter->toArray();
        $this->assertModelData($parameter->toArray(), $dbParameter);
    }

    /**
     * @test update
     */
    public function test_update_parameter()
    {
        $parameter = factory(Parameter::class)->create();
        $fakeParameter = factory(Parameter::class)->make()->toArray();

        $updatedParameter = $this->parameterRepo->update($fakeParameter, $parameter->id);

        $this->assertModelData($fakeParameter, $updatedParameter->toArray());
        $dbParameter = $this->parameterRepo->find($parameter->id);
        $this->assertModelData($fakeParameter, $dbParameter->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_parameter()
    {
        $parameter = factory(Parameter::class)->create();

        $resp = $this->parameterRepo->delete($parameter->id);

        $this->assertTrue($resp);
        $this->assertNull(Parameter::find($parameter->id), 'Parameter should not exist in DB');
    }
}

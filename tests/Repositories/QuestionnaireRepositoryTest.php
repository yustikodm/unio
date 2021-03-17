<?php namespace Tests\Repositories;

use App\Models\Questionnaire;
use App\Repositories\QuestionnaireRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class QuestionnaireRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var QuestionnaireRepository
     */
    protected $questionnaireRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->questionnaireRepo = \App::make(QuestionnaireRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_questionnaire()
    {
        $questionnaire = factory(Questionnaire::class)->make()->toArray();

        $createdQuestionnaire = $this->questionnaireRepo->create($questionnaire);

        $createdQuestionnaire = $createdQuestionnaire->toArray();
        $this->assertArrayHasKey('id', $createdQuestionnaire);
        $this->assertNotNull($createdQuestionnaire['id'], 'Created Questionnaire must have id specified');
        $this->assertNotNull(Questionnaire::find($createdQuestionnaire['id']), 'Questionnaire with given id must be in DB');
        $this->assertModelData($questionnaire, $createdQuestionnaire);
    }

    /**
     * @test read
     */
    public function test_read_questionnaire()
    {
        $questionnaire = factory(Questionnaire::class)->create();

        $dbQuestionnaire = $this->questionnaireRepo->find($questionnaire->id);

        $dbQuestionnaire = $dbQuestionnaire->toArray();
        $this->assertModelData($questionnaire->toArray(), $dbQuestionnaire);
    }

    /**
     * @test update
     */
    public function test_update_questionnaire()
    {
        $questionnaire = factory(Questionnaire::class)->create();
        $fakeQuestionnaire = factory(Questionnaire::class)->make()->toArray();

        $updatedQuestionnaire = $this->questionnaireRepo->update($fakeQuestionnaire, $questionnaire->id);

        $this->assertModelData($fakeQuestionnaire, $updatedQuestionnaire->toArray());
        $dbQuestionnaire = $this->questionnaireRepo->find($questionnaire->id);
        $this->assertModelData($fakeQuestionnaire, $dbQuestionnaire->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_questionnaire()
    {
        $questionnaire = factory(Questionnaire::class)->create();

        $resp = $this->questionnaireRepo->delete($questionnaire->id);

        $this->assertTrue($resp);
        $this->assertNull(Questionnaire::find($questionnaire->id), 'Questionnaire should not exist in DB');
    }
}

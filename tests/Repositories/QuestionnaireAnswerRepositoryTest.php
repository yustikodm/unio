<?php namespace Tests\Repositories;

use App\Models\QuestionnaireAnswer;
use App\Repositories\QuestionnaireAnswerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class QuestionnaireAnswerRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var QuestionnaireAnswerRepository
     */
    protected $questionnaireAnswerRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->questionnaireAnswerRepo = \App::make(QuestionnaireAnswerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_questionnaire_answer()
    {
        $questionnaireAnswer = factory(QuestionnaireAnswer::class)->make()->toArray();

        $createdQuestionnaireAnswer = $this->questionnaireAnswerRepo->create($questionnaireAnswer);

        $createdQuestionnaireAnswer = $createdQuestionnaireAnswer->toArray();
        $this->assertArrayHasKey('id', $createdQuestionnaireAnswer);
        $this->assertNotNull($createdQuestionnaireAnswer['id'], 'Created QuestionnaireAnswer must have id specified');
        $this->assertNotNull(QuestionnaireAnswer::find($createdQuestionnaireAnswer['id']), 'QuestionnaireAnswer with given id must be in DB');
        $this->assertModelData($questionnaireAnswer, $createdQuestionnaireAnswer);
    }

    /**
     * @test read
     */
    public function test_read_questionnaire_answer()
    {
        $questionnaireAnswer = factory(QuestionnaireAnswer::class)->create();

        $dbQuestionnaireAnswer = $this->questionnaireAnswerRepo->find($questionnaireAnswer->id);

        $dbQuestionnaireAnswer = $dbQuestionnaireAnswer->toArray();
        $this->assertModelData($questionnaireAnswer->toArray(), $dbQuestionnaireAnswer);
    }

    /**
     * @test update
     */
    public function test_update_questionnaire_answer()
    {
        $questionnaireAnswer = factory(QuestionnaireAnswer::class)->create();
        $fakeQuestionnaireAnswer = factory(QuestionnaireAnswer::class)->make()->toArray();

        $updatedQuestionnaireAnswer = $this->questionnaireAnswerRepo->update($fakeQuestionnaireAnswer, $questionnaireAnswer->id);

        $this->assertModelData($fakeQuestionnaireAnswer, $updatedQuestionnaireAnswer->toArray());
        $dbQuestionnaireAnswer = $this->questionnaireAnswerRepo->find($questionnaireAnswer->id);
        $this->assertModelData($fakeQuestionnaireAnswer, $dbQuestionnaireAnswer->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_questionnaire_answer()
    {
        $questionnaireAnswer = factory(QuestionnaireAnswer::class)->create();

        $resp = $this->questionnaireAnswerRepo->delete($questionnaireAnswer->id);

        $this->assertTrue($resp);
        $this->assertNull(QuestionnaireAnswer::find($questionnaireAnswer->id), 'QuestionnaireAnswer should not exist in DB');
    }
}

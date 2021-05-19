<?php namespace Tests\Repositories;

use App\Models\QuestionnaireImage;
use App\Repositories\QuestionnaireImageRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class QuestionnaireImageRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var QuestionnaireImageRepository
     */
    protected $questionnaireImageRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->questionnaireImageRepo = \App::make(QuestionnaireImageRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_questionnaire_image()
    {
        $questionnaireImage = factory(QuestionnaireImage::class)->make()->toArray();

        $createdQuestionnaireImage = $this->questionnaireImageRepo->create($questionnaireImage);

        $createdQuestionnaireImage = $createdQuestionnaireImage->toArray();
        $this->assertArrayHasKey('id', $createdQuestionnaireImage);
        $this->assertNotNull($createdQuestionnaireImage['id'], 'Created QuestionnaireImage must have id specified');
        $this->assertNotNull(QuestionnaireImage::find($createdQuestionnaireImage['id']), 'QuestionnaireImage with given id must be in DB');
        $this->assertModelData($questionnaireImage, $createdQuestionnaireImage);
    }

    /**
     * @test read
     */
    public function test_read_questionnaire_image()
    {
        $questionnaireImage = factory(QuestionnaireImage::class)->create();

        $dbQuestionnaireImage = $this->questionnaireImageRepo->find($questionnaireImage->id);

        $dbQuestionnaireImage = $dbQuestionnaireImage->toArray();
        $this->assertModelData($questionnaireImage->toArray(), $dbQuestionnaireImage);
    }

    /**
     * @test update
     */
    public function test_update_questionnaire_image()
    {
        $questionnaireImage = factory(QuestionnaireImage::class)->create();
        $fakeQuestionnaireImage = factory(QuestionnaireImage::class)->make()->toArray();

        $updatedQuestionnaireImage = $this->questionnaireImageRepo->update($fakeQuestionnaireImage, $questionnaireImage->id);

        $this->assertModelData($fakeQuestionnaireImage, $updatedQuestionnaireImage->toArray());
        $dbQuestionnaireImage = $this->questionnaireImageRepo->find($questionnaireImage->id);
        $this->assertModelData($fakeQuestionnaireImage, $dbQuestionnaireImage->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_questionnaire_image()
    {
        $questionnaireImage = factory(QuestionnaireImage::class)->create();

        $resp = $this->questionnaireImageRepo->delete($questionnaireImage->id);

        $this->assertTrue($resp);
        $this->assertNull(QuestionnaireImage::find($questionnaireImage->id), 'QuestionnaireImage should not exist in DB');
    }
}

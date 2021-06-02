<?php namespace Tests\Repositories;

use App\Models\ImageBanner;
use App\Repositories\ImageBannerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ImageBannerRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ImageBannerRepository
     */
    protected $imageBannerRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->imageBannerRepo = \App::make(ImageBannerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_image_banner()
    {
        $imageBanner = factory(ImageBanner::class)->make()->toArray();

        $createdImageBanner = $this->imageBannerRepo->create($imageBanner);

        $createdImageBanner = $createdImageBanner->toArray();
        $this->assertArrayHasKey('id', $createdImageBanner);
        $this->assertNotNull($createdImageBanner['id'], 'Created ImageBanner must have id specified');
        $this->assertNotNull(ImageBanner::find($createdImageBanner['id']), 'ImageBanner with given id must be in DB');
        $this->assertModelData($imageBanner, $createdImageBanner);
    }

    /**
     * @test read
     */
    public function test_read_image_banner()
    {
        $imageBanner = factory(ImageBanner::class)->create();

        $dbImageBanner = $this->imageBannerRepo->find($imageBanner->id);

        $dbImageBanner = $dbImageBanner->toArray();
        $this->assertModelData($imageBanner->toArray(), $dbImageBanner);
    }

    /**
     * @test update
     */
    public function test_update_image_banner()
    {
        $imageBanner = factory(ImageBanner::class)->create();
        $fakeImageBanner = factory(ImageBanner::class)->make()->toArray();

        $updatedImageBanner = $this->imageBannerRepo->update($fakeImageBanner, $imageBanner->id);

        $this->assertModelData($fakeImageBanner, $updatedImageBanner->toArray());
        $dbImageBanner = $this->imageBannerRepo->find($imageBanner->id);
        $this->assertModelData($fakeImageBanner, $dbImageBanner->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_image_banner()
    {
        $imageBanner = factory(ImageBanner::class)->create();

        $resp = $this->imageBannerRepo->delete($imageBanner->id);

        $this->assertTrue($resp);
        $this->assertNull(ImageBanner::find($imageBanner->id), 'ImageBanner should not exist in DB');
    }
}

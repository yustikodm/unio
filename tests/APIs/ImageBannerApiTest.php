<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ImageBanner;

class ImageBannerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_image_banner()
    {
        $imageBanner = factory(ImageBanner::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/image_banner', $imageBanner
        );

        $this->assertApiResponse($imageBanner);
    }

    /**
     * @test
     */
    public function test_read_image_banner()
    {
        $imageBanner = factory(ImageBanner::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/image_banner/'.$imageBanner->id
        );

        $this->assertApiResponse($imageBanner->toArray());
    }

    /**
     * @test
     */
    public function test_update_image_banner()
    {
        $imageBanner = factory(ImageBanner::class)->create();
        $editedImageBanner = factory(ImageBanner::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/image_banner/'.$imageBanner->id,
            $editedImageBanner
        );

        $this->assertApiResponse($editedImageBanner);
    }

    /**
     * @test
     */
    public function test_delete_image_banner()
    {
        $imageBanner = factory(ImageBanner::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/image_banner/'.$imageBanner->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/image_banner/'.$imageBanner->id
        );

        $this->response->assertStatus(404);
    }
}

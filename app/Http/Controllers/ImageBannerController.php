<?php

namespace App\Http\Controllers;

use App\DataTables\ImageBannerDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateImageBannerRequest;
use App\Http\Requests\UpdateImageBannerRequest;
use App\Repositories\ImageBannerRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ImageBannerController extends AppBaseController
{
    /** @var  ImageBannerRepository */
    private $imageBannerRepository;

    public function __construct(ImageBannerRepository $imageBannerRepo)
    {
        $this->imageBannerRepository = $imageBannerRepo;
    }

    /**
     * Display a listing of the ImageBanner.
     *
     * @param ImageBannerDataTable $imageBannerDataTable
     * @return Response
     */
    public function index(ImageBannerDataTable $imageBannerDataTable)
    {
        return $imageBannerDataTable->render('image_banner.index');
    }

    /**
     * Show the form for creating a new ImageBanner.
     *
     * @return Response
     */
    public function create()
    {
        return view('image_banner.create');
    }

    /**
     * Store a newly created ImageBanner in storage.
     *
     * @param CreateImageBannerRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $imageBanner = $this->imageBannerRepository->create($input);

        Flash::success('Image Banner saved successfully.');

        return redirect(route('imageBanner.index'));
    }

    /**
     * Display the specified ImageBanner.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $imageBanner = $this->imageBannerRepository->find($id);

        if (empty($imageBanner)) {
            Flash::error('Image Banner not found');

            return redirect(route('imageBanner.index'));
        }

        return view('image_banner.show')->with('imageBanner', $imageBanner);
    }

    /**
     * Show the form for editing the specified ImageBanner.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $imageBanner = $this->imageBannerRepository->find($id);

        if (empty($imageBanner)) {
            Flash::error('Image Banner not found');

            return redirect(route('imageBanner.index'));
        }

        return view('image_banner.edit')->with('imageBanner', $imageBanner);
    }

    /**
     * Update the specified ImageBanner in storage.
     *
     * @param  int              $id
     * @param UpdateImageBannerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImageBannerRequest $request)
    {
        $imageBanner = $this->imageBannerRepository->find($id);

        if (empty($imageBanner)) {
            Flash::error('Image Banner not found');

            return redirect(route('imageBanner.index'));
        }

        $imageBanner = $this->imageBannerRepository->update($request->all(), $id);

        Flash::success('Image Banner updated successfully.');

        return redirect(route('imageBanner.index'));
    }

    /**
     * Remove the specified ImageBanner from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $imageBanner = $this->imageBannerRepository->find($id);

        if (empty($imageBanner)) {
            Flash::error('Image Banner not found');

            return redirect(route('imageBanner.index'));
        }

        $this->imageBannerRepository->delete($id);

        Flash::success('Image Banner deleted successfully.');

        return redirect(route('imageBanner.index'));
    }
}

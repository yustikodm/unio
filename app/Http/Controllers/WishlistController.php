<?php

namespace App\Http\Controllers;

use App\DataTables\WishlistDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;
use App\Repositories\WishlistRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;

class WishlistController extends AppBaseController
{
    /** @var  WishlistRepository */
    private $wishlistRepository;

    public function __construct(WishlistRepository $wishlistRepo)
    {
        $this->wishlistRepository = $wishlistRepo;
    }

    /**
     * Display a listing of the Wishlist.
     *
     * @param WishlistDataTable $wishlistDataTable
     * @return Response
     */
    public function index(WishlistDataTable $wishlistDataTable)
    {
        return $wishlistDataTable->render('wishlists.index');
    }

    /**
     * Show the form for creating a new Wishlist.
     *
     * @return Response
     */
    public function create()
    {
        return view('wishlists.create');
    }

    /**
     * Store a newly created Wishlist in storage.
     *
     * @param CreateWishlistRequest $request
     *
     * @return Response
     */
    public function store(CreateWishlistRequest $request)
    {
        $input = $request->only([
            'university_id',
            'major_id',
            'service_id',
            'user_id',
            'description'
        ]);

        $wishlist = $this->wishlistRepository->create($input);

        Flash::success('Wishlist saved successfully.');

        return redirect(route('wishlists.index'));
    }

    /**
     * Display the specified Wishlist.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wishlist = $this->wishlistRepository->find($id);

        if (empty($wishlist)) {
            Flash::error('Wishlist not found');

            return redirect(route('wishlists.index'));
        }

        return view('wishlists.show')->with('wishlist', $wishlist);
    }

    /**
     * Show the form for editing the specified Wishlist.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $wishlist = $this->wishlistRepository->find($id);

        if (empty($wishlist)) {
            Flash::error('Wishlist not found');

            return redirect(route('wishlists.index'));
        }

        return view('wishlists.edit')->with('wishlist', $wishlist);
    }

    /**
     * Update the specified Wishlist in storage.
     *
     * @param  int              $id
     * @param UpdateWishlistRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWishlistRequest $request)
    {
        $wishlist = $this->wishlistRepository->find($id);

        if (empty($wishlist)) {
            Flash::error('Wishlist not found');

            return redirect(route('wishlists.index'));
        }
        
        $input = $request->only([
            'university_id',
            'major_id',
            'service_id',
            'user_id',
            'description'
        ]);

        $wishlist = $this->wishlistRepository->update($input, $id);

        Flash::success('Wishlist updated successfully.');

        return redirect(route('wishlists.index'));
    }

    /**
     * Remove the specified Wishlist from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $wishlist = $this->wishlistRepository->find($id);

        if (empty($wishlist)) {
            Flash::error('Wishlist not found');

            return redirect(route('wishlists.index'));
        }

        $this->wishlistRepository->delete($id);

        Flash::success('Wishlist deleted successfully.');

        return redirect(route('wishlists.index'));
    }
}

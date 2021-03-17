<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePromoAPIRequest;
use App\Http\Requests\API\UpdatePromoAPIRequest;
use App\Models\Promo;
use App\Repositories\PromoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PromoController
 * @package App\Http\Controllers\API
 */

class PromoAPIController extends AppBaseController
{
    /** @var  PromoRepository */
    private $promoRepository;

    public function __construct(PromoRepository $promoRepo)
    {
        $this->promoRepository = $promoRepo;
    }

    /**
     * Display a listing of the Promo.
     * GET|HEAD /promo
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $promo = $this->promoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($promo->toArray(), 'Promo retrieved successfully');
    }

    /**
     * Store a newly created Promo in storage.
     * POST /promo
     *
     * @param CreatePromoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePromoAPIRequest $request)
    {
        $input = $request->all();

        $promo = $this->promoRepository->create($input);

        return $this->sendResponse($promo->toArray(), 'Promo saved successfully');
    }

    /**
     * Display the specified Promo.
     * GET|HEAD /promo/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Promo $promo */
        $promo = $this->promoRepository->find($id);

        if (empty($promo)) {
            return $this->sendError('Promo not found');
        }

        return $this->sendResponse($promo->toArray(), 'Promo retrieved successfully');
    }

    /**
     * Update the specified Promo in storage.
     * PUT/PATCH /promo/{id}
     *
     * @param int $id
     * @param UpdatePromoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePromoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Promo $promo */
        $promo = $this->promoRepository->find($id);

        if (empty($promo)) {
            return $this->sendError('Promo not found');
        }

        $promo = $this->promoRepository->update($input, $id);

        return $this->sendResponse($promo->toArray(), 'Promo updated successfully');
    }

    /**
     * Remove the specified Promo from storage.
     * DELETE /promo/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Promo $promo */
        $promo = $this->promoRepository->find($id);

        if (empty($promo)) {
            return $this->sendError('Promo not found');
        }

        $promo->delete();

        return $this->sendSuccess('Promo deleted successfully');
    }

    public function checkAvaiablePaket($id)
    {
        $promo = $this->promoRepository->checkKetersediaan($id);
       if($promo) {
            return $this->sendSuccess('promo tersedia'); 
        }else{
            return $this->sendError('promo tidak tersedia');
        }
    }
}

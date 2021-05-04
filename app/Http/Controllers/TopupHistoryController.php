<?php

namespace App\Http\Controllers;

use App\DataTables\TopupHistoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTopupHistoryRequest;
use App\Http\Requests\UpdateTopupHistoryRequest;
use App\Repositories\TopupHistoryRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PointLogRepository;
use App\Repositories\TransactionRepository;

class TopupHistoryController extends AppBaseController
{
  /** @var  topupHistoryRepository */
  private $topupHistoryRepository;

  /** @var  transactionRepository */
  private $transactionRepository;

  /** @var  pointLogRepository */
  private $pointLogRepository;

  public function __construct(TopupHistoryRepository $topupHistoryRepo, TransactionRepository $pointTransactionRepo, PointLogRepository $pointLogRepo)
  {
    $this->topupHistoryRepository = $topupHistoryRepo;

    $this->transactionRepository = $pointTransactionRepo;

    $this->pointLogRepository = $pointLogRepo;
  }

  /**
   * Display a listing of the TopupHistory.
   *
   * @param TopupHistoryDataTable $topupHistoryDataTable
   * @return Response
   */
  public function index(TopupHistoryDataTable $topupHistoryDataTable)
  {
    return $topupHistoryDataTable->render('topup_history.index');
  }

  /**
   * Show the form for creating a new PointTopup.
   *
   * @return Response
   */
  public function create()
  {
    return view('topup_history.create');
  }

  /**
   * Store a newly created PointTopup in storage.
   *
   * @param CreateTopupHistoryRequest $request
   *
   * @return Response
   */
  public function store(CreateTopupHistoryRequest $request)
  {
    $input = $request->only([
      'user_id',
      'country_id',
      'package_id',
      'amount',
    ]);

    try {
      $topup = $this->topupHistoryRepository->create($input);

      // $transaction = $this->transactionRepository->create([
      //   'user_id' => $input['user_id'],
      //   'entity_id' => $pointTopup->id,
      //   'entity_type' => 'point-topup',
      //   'amount' => $input['amount'],
      //   'point_conversion' => $input['point_conversion'],
      // ]);

      // $family = Family::getFamilyByChild($input['user_id']);
      // $point = $this->pointLogRepository->getPointData($family->parent_user);

      // $this->pointLogRepository->create([
      //   'parent_id' => $family->parent_user,
      //   'transaction_id' => $pointTopup->id,
      //   'transaction_type' => 'point-topup',
      //   'point_before' => $point->point_before,
      //   'point_after' => $point->point_before + $input['point_conversion']
      // ]);
    } catch (\Exception $error) {
      return 'Error! ' . $error->getMessage();
    }

    Flash::success('Point Topup saved successfully.');

    return redirect(route('topup-history.index'));
  }

  /**
   * Display the specified Topup History.
   *
   * @param  int $id
   *
   * @return Response
   */
  public function show($id)
  {
    $topupHistory = $this->topupHistoryRepository->find($id);

    if (empty($topupHistory)) {
      Flash::error('Topup History not found');

      return redirect(route('topup-history.index'));
    }

    return view('topup_history.show')->with('topupHistory', $topupHistory);
  }

  /**
   * Show the form for editing the specified PointTopup.
   *
   * @param  int $id
   *
   * @return Response
   */
  public function edit($id)
  {
    $topupHistory = $this->topupHistoryRepository->find($id);

    if (empty($topupHistory)) {
      Flash::error('Point Topup not found');

      return redirect(route('topup-history.index'));
    }

    return view('topup_history.edit')->with('topupHistory', $topupHistory);
  }

  /**
   * Update the specified PointTopup in storage.
   *
   * @param  int              $id
   * @param UpdateTopupHistoryRequest $request
   *
   * @return Response
   */
  public function update($id, UpdateTopupHistoryRequest $request)
  {
    $topupHistory = $this->topupHistoryRepository->find($id);

    if (empty($topupHistory)) {
      Flash::error('Point Topup not found');

      return redirect(route('topup-history.index'));
    }

    $input = $request->only([
      'user_id',
      'country_id',
      'package_id',
      'code',
      'amount',
    ]);

    $this->topupHistoryRepository->update($input, $id);

    Flash::success('Point Topup updated successfully.');

    return redirect(route('topup-history.index'));
  }

  /**
   * Remove the specified topupHistory from storage.
   *
   * @param  int $id
   *
   * @return Response
   */
  public function destroy($id)
  {
    $topupHistory = $this->topupHistoryRepository->find($id);

    if (empty($topupHistory)) {
      Flash::error('Topup History not found');

      return redirect(route('topup-history.index'));
    }

    $this->topupHistoryRepository->delete($id);

    Flash::success('Point Topup deleted successfully.');

    return redirect(route('topup-history.index'));
  }

  public function getListVA()
  {
    // $listVA = $this->topupHistoryRepository->getListVA();

    
  }
}

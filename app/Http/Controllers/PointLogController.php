<?php

namespace App\Http\Controllers;

use App\DataTables\PointLogDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePointLogRequest;
use App\Http\Requests\UpdatePointLogRequest;
use App\Repositories\PointLogRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;

class PointLogController extends AppBaseController
{
    /** @var  PointLogRepository */
    private $pointLogRepository;

    public function __construct(PointLogRepository $pointLogRepo)
    {
        $this->pointLogRepository = $pointLogRepo;
    }

    /**
     * Display a listing of the PointLog.
     *
     * @param PointLogDataTable $pointLogDataTable
     * @return Response
     */
    public function index(PointLogDataTable $pointLogDataTable)
    {
        return $pointLogDataTable->render('point_logs.index');
    }

    /**
     * Show the form for creating a new PointLog.
     *
     * @return Response
     */
    public function create()
    {
        return view('point_logs.create');
    }

    /**
     * Store a newly created PointLog in storage.
     *
     * @param CreatePointLogRequest $request
     *
     * @return Response
     */
    public function store(CreatePointLogRequest $request)
    {
        $input = $request->only([
            'parent_id',
            'transaction_id',
            'transaction_type',
            'point_before',
            'point_after'
        ]);

        $pointLog = $this->pointLogRepository->create($input);

        Flash::success('Point Log saved successfully.');

        return redirect(route('point-logs.index'));
    }

    /**
     * Display the specified PointLog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pointLog = $this->pointLogRepository->find($id);

        if (empty($pointLog)) {
            Flash::error('Point Log not found');

            return redirect(route('point-logs.index'));
        }

        return view('point_logs.show')->with('pointLog', $pointLog);
    }

    /**
     * Show the form for editing the specified PointLog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pointLog = $this->pointLogRepository->find($id);

        if (empty($pointLog)) {
            Flash::error('Point Log not found');

            return redirect(route('point-logs.index'));
        }

        return view('point_logs.edit')->with('pointLog', $pointLog);
    }

    /**
     * Update the specified PointLog in storage.
     *
     * @param  int              $id
     * @param UpdatePointLogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePointLogRequest $request)
    {
        $pointLog = $this->pointLogRepository->find($id);

        if (empty($pointLog)) {
            Flash::error('Point Log not found');

            return redirect(route('point-logs.index'));
        }

        $input = $request->only([
          'parent_id',
          'transaction_id',
          'transaction_type',
          'point_before',
          'point_after'
        ]);

        $pointLog = $this->pointLogRepository->update($input, $id);

        Flash::success('Point Log updated successfully.');

        return redirect(route('point-logs.index'));
    }

    /**
     * Remove the specified PointLog from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pointLog = $this->pointLogRepository->find($id);

        if (empty($pointLog)) {
            Flash::error('Point Log not found');

            return redirect(route('point-logs.index'));
        }

        $this->pointLogRepository->delete($id);

        Flash::success('Point Log deleted successfully.');

        return redirect(route('point-logs.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDetailPermintaanMaggotRequest;
use App\Http\Requests\UpdateDetailPermintaanMaggotRequest;
use App\Repositories\DetailPermintaanMaggotRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\PermintaanMaggot;
use Flash;
use Response;

class DetailPermintaanMaggotController extends AppBaseController
{
    /** @var DetailPermintaanMaggotRepository $detailPermintaanMaggotRepository*/
    private $detailPermintaanMaggotRepository;

    public function __construct(DetailPermintaanMaggotRepository $detailPermintaanMaggotRepo)
    {
        $this->detailPermintaanMaggotRepository = $detailPermintaanMaggotRepo;
    }

    /**
     * Display a listing of the DetailPermintaanMaggot.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $detailPermintaanMaggots = $this->detailPermintaanMaggotRepository->all();

        return view('detail_permintaan_maggots.index')
            ->with('detailPermintaanMaggots', $detailPermintaanMaggots);
    }

    /**
     * Show the form for creating a new DetailPermintaanMaggot.
     *
     * @return Response
     */
    public function create($id)
    {
        // dd($id);
        $permintaanMaggot = PermintaanMaggot::where('id', $id )->first();
        // $permintaanMaggot = PermintaanMaggot::all();
        // dd($permintaanMaggot);
        // dd($permintaanMaggot->DetailPermintaanMaggot);

        return view('detail_permintaan_maggots.create')->with('permintaanMaggot', $permintaanMaggot);
    }

    /**
     * Store a newly created DetailPermintaanMaggot in storage.
     *
     * @param CreateDetailPermintaanMaggotRequest $request
     *
     * @return Response
     */
    public function store(CreateDetailPermintaanMaggotRequest $request)
    {
        $input = $request->all();
        
        $detailPermintaanMaggot = $this->detailPermintaanMaggotRepository->create($input);
        
        Flash::success('Detail Permintaan Maggot saved successfully.');
        
        // dd($detailPermintaanMaggot);
        return redirect(route('permintaan_maggot.index'));
    }

    /**
     * Display the specified DetailPermintaanMaggot.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailPermintaanMaggot = $this->detailPermintaanMaggotRepository->find($id);

        if (empty($detailPermintaanMaggot)) {
            Flash::error('Detail Permintaan Maggot not found');

            return redirect(route('detailPermintaanMaggots.index'));
        }

        return view('detail_permintaan_maggots.show')->with('detailPermintaanMaggot', $detailPermintaanMaggot);
    }

    /**
     * Show the form for editing the specified DetailPermintaanMaggot.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detailPermintaanMaggot = $this->detailPermintaanMaggotRepository->find($id);

        if (empty($detailPermintaanMaggot)) {
            Flash::error('Detail Permintaan Maggot not found');

            return redirect(route('detailPermintaanMaggots.index'));
        }

        return view('detail_permintaan_maggots.edit')->with('detailPermintaanMaggot', $detailPermintaanMaggot);
    }

    /**
     * Update the specified DetailPermintaanMaggot in storage.
     *
     * @param int $id
     * @param UpdateDetailPermintaanMaggotRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetailPermintaanMaggotRequest $request)
    {
        $detailPermintaanMaggot = $this->detailPermintaanMaggotRepository->find($id);

        if (empty($detailPermintaanMaggot)) {
            Flash::error('Detail Permintaan Maggot not found');

            return redirect(route('detailPermintaanMaggots.index'));
        }

        $detailPermintaanMaggot = $this->detailPermintaanMaggotRepository->update($request->all(), $id);

        Flash::success('Detail Permintaan Maggot updated successfully.');

        return redirect(route('detailPermintaanMaggots.index'));
    }

    /**
     * Remove the specified DetailPermintaanMaggot from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailPermintaanMaggot = $this->detailPermintaanMaggotRepository->find($id);

        if (empty($detailPermintaanMaggot)) {
            Flash::error('Detail Permintaan Maggot not found');

            return redirect(route('detailPermintaanMaggots.index'));
        }

        $this->detailPermintaanMaggotRepository->delete($id);

        Flash::success('Detail Permintaan Maggot deleted successfully.');

        return redirect(route('detailPermintaanMaggots.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProdukMaggotRequest;
use App\Http\Requests\UpdateProdukMaggotRequest;
use App\Repositories\ProdukMaggotRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProdukMaggotController extends AppBaseController
{
    /** @var ProdukMaggotRepository $produkMaggotRepository*/
    private $produkMaggotRepository;

    public function __construct(ProdukMaggotRepository $produkMaggotRepo)
    {
        $this->produkMaggotRepository = $produkMaggotRepo;
    }

    /**
     * Display a listing of the ProdukMaggot.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $produkMaggots = $this->produkMaggotRepository->all();

        return view('produk_maggots.index')
            ->with('produkMaggots', $produkMaggots);
    }

    /**
     * Show the form for creating a new ProdukMaggot.
     *
     * @return Response
     */
    public function create()
    {
        return view('produk_maggots.create');
    }

    /**
     * Store a newly created ProdukMaggot in storage.
     *
     * @param CreateProdukMaggotRequest $request
     *
     * @return Response
     */
    public function store(CreateProdukMaggotRequest $request)
    {
        $input = $request->all();

        $produkMaggot = $this->produkMaggotRepository->create($input);

        Flash::success('Produk Maggot saved successfully.');

        return redirect(route('produkMaggots.index'));
    }

    /**
     * Display the specified ProdukMaggot.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $produkMaggot = $this->produkMaggotRepository->find($id);

        if (empty($produkMaggot)) {
            Flash::error('Produk Maggot not found');

            return redirect(route('produkMaggots.index'));
        }

        return view('produk_maggots.show')->with('produkMaggot', $produkMaggot);
    }

    /**
     * Show the form for editing the specified ProdukMaggot.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $produkMaggot = $this->produkMaggotRepository->find($id);

        if (empty($produkMaggot)) {
            Flash::error('Produk Maggot not found');

            return redirect(route('produkMaggots.index'));
        }

        return view('produk_maggots.edit')->with('produkMaggot', $produkMaggot);
    }

    /**
     * Update the specified ProdukMaggot in storage.
     *
     * @param int $id
     * @param UpdateProdukMaggotRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProdukMaggotRequest $request)
    {
        $produkMaggot = $this->produkMaggotRepository->find($id);

        if (empty($produkMaggot)) {
            Flash::error('Produk Maggot not found');

            return redirect(route('produkMaggots.index'));
        }

        $produkMaggot = $this->produkMaggotRepository->update($request->all(), $id);

        Flash::success('Produk Maggot updated successfully.');

        return redirect(route('produkMaggots.index'));
    }

    /**
     * Remove the specified ProdukMaggot from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $produkMaggot = $this->produkMaggotRepository->find($id);

        if (empty($produkMaggot)) {
            Flash::error('Produk Maggot not found');

            return redirect(route('produkMaggots.index'));
        }

        $this->produkMaggotRepository->delete($id);

        Flash::success('Produk Maggot deleted successfully.');

        return redirect(route('produkMaggots.index'));
    }
}

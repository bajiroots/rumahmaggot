<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\PermintaanMaggot;
use App\Models\ProdukMaggot;
use Flash;
use Response;

class PermintaanMaggotController extends AppBaseController
{
    /** @var UserRepository $userRepository*/
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $permintaan_maggots = PermintaanMaggot::all();

        // dd($permintaan_maggots->first()->detailPermintaanMaggots);

        return view('permintaan_maggot.index')
            ->with('permintaan_maggots', $permintaan_maggots);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {

        $produk_maggots = ProdukMaggot::all();

        return view('permintaan_maggot.create') ->with('produk_maggots', $produk_maggots);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        // dd($input);

        $user = PermintaanMaggot::create($input);

        Flash::success('Permintaan Maggot Berhasil Dibuat');

        return redirect(route('permintaan_maggot.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permintaan_maggot = PermintaanMaggot::find($id)->get();

        if (empty($user)) {
            Flash::error('Permintaan Maggot not found');

            return redirect(route('permintaan_maggot.index'));
        }

        return view('permintaan_maggot.show')->with('permintaan_maggot', $permintaan_maggot);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permintaan_maggot = PermintaanMaggot::find($id)->first();

        if (empty($permintaan_maggot)) {
            Flash::error('Permintaan Maggot not found');

            return redirect(route('permintaan_maggot.index'));
        }

        // dd($permintaan_maggot);
        return view('permintaan_maggot.edit')->with('permintaan_maggot', $permintaan_maggot);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $permintaan_maggot = PermintaanMaggot::find($id);
        
        if (empty($permintaan_maggot)) {
            Flash::error('User not found');
            
            return redirect(route('permintaan_maggot.index'));
        }
        
        $permintaan_maggot->update($request->all());
        // dd(0);

        Flash::success('Permintaan Maggot updated successfully.');

        return redirect(route('permintaan_maggot.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permintaan_maggot = PermintaanMaggot::find($id);

        if (empty($permintaan_maggot)) {
            Flash::error('permintaan not found');

            return redirect(route('permintaan_maggot.index'));
        }

        $permintaan_maggot->delete($id);

        Flash::success('Permintaan Maaggot deleted successfully.');

        return redirect(route('permintaan_maggot.index'));
    }

    public function getHarga(Request $request)
    {
        $jenisMaggot = $request->input('jenis_maggot');

        $harga = ProdukMaggot::where('id', $jenisMaggot)->value('harga');

        return response()->json(['harga' => $harga]);
    }
}

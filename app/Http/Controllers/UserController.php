<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\Http;

class UserController extends AppBaseController
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
        $users = $this->userRepository->all();

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $kecamatan = Http::withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImU0MDYxYTE4NTE2Zjc2ZWIxNDEwYmQwY2Q3YjEyZGJiMDY2ZjJkZTUyYmM5YTc3NzU1YWQ1YmRlMWY3MDExM2Q2N2ZiNzQ5NmU2YTIxZmFlIn0.eyJhdWQiOiIzIiwianRpIjoiZTQwNjFhMTg1MTZmNzZlYjE0MTBiZDBjZDdiMTJkYmIwNjZmMmRlNTJiYzlhNzc3NTVhZDViZGUxZjcwMTEzZDY3ZmI3NDk2ZTZhMjFmYWUiLCJpYXQiOjE2OTY1MDQzNDYsIm5iZiI6MTY5NjUwNDM0NiwiZXhwIjoxNzI4MTI2NzQ2LCJzdWIiOiI3NjciLCJzY29wZXMiOlsibW9ub2dyYWZpLWtlY2FtYXRhbiJdfQ.fVTwl4qsUCSqCyGe0uj2x-c07PfnoZZ1hkLH0wDtOUerZp1byuwifuL_84NXWzjZ7W0o7BEJyCiS6owcgoncChHxprPkrLb8ZtS3FZJFynEaSZoTcM_BeyhFUDvGz1UEQW3NBAijDQWazFlt-q7BDRPewUXmjgLnXecHLOpuK3NE8MkkfLpRU6gUdGMM5o_Uuv0OQnSiYYdGwpIgrSp14G9goaem6UjBAD9kZw_iep9VTLAHpwAPYkr0tRMfaDwp5gFJT3VY99ChtB1jdO4FWoyQxzMwZKYUtIIaCYw9vxFvgXnkVio8kpWEEfeOrrgNPs04lIz5Vz8RsQia1lEHE80w1csNFmtQbhN_p7btHTM7E2ZCDTQjY0QBPWnPGwnDRdfujSRWqW0WF3Jr6nlNdZkhqEa2RrWzydzf-ed6N-0J3xKFcTATX94gJco2u_eARAPkLorfHDSFVeslZ0qzLbgm8MRUMmDnWIgnJ9rjca9EbLv3h9yIDZy-_PzLn7FfODt1dSD6pkzaRz4qKoqMPDvkVzMg37ITvOMvmm1DdIQDRckppVJ9Eo2-7xglgnE0DPHxH-nSYyIGDOZOY7VLEYkOwq65p5IhIazSQglfaIbT7ppZgFqVp5dErylHzQ6qrBdhNx8yuC5MO53Ej1BdqxHFz5mCtLphc3SuSk7LSog')->get('http://api.samarindakota.go.id/api/v2/generate/data-monografi/monografi-kecamatan');

        $kecamatan = json_decode($kecamatan->body());

        // foreach ($kecamatan as $item) {
        //     dump($item->nama);
        // }

        // dd($kecamatan);
        

        return view('users.create')->with('kecamatan', $kecamatan);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
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
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
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
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
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
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }
}

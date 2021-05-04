<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserAPIRequest;
use App\Http\Requests\API\UpdateUserAPIRequest;
use App\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\UserResource;
use App\Repositories\BiodataRepository;
use Exception;

/**
 * Class UserController
 * @package App\Http\Controllers\API
 */

class UserAPIController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    private $biodataRepository;

    public function __construct(UserRepository $userRepo, BiodataRepository $biodataRepo)
    {
        $this->userRepository = $userRepo;

        $this->biodataRepository = $biodataRepo;
    }

    /**
     * Display a listing of the User.
     * GET|HEAD /users
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $user = $this->userRepository->paginate(15, [], ['name' => $request->name]);

        return $this->sendResponse($user, 'User retrieved successfully');
    }

    // /**
    //  * Store a newly created User in storage.
    //  * POST /users
    //  *
    //  * @param CreateUserAPIRequest $request
    //  *
    //  * @return Response
    //  */
    // public function store(CreateUserAPIRequest $request)
    // {
    //     $input = $request->all();

    //     $user = $this->userRepository->create($input);

    //     return $this->sendResponse(new UserResource($user), 'User saved successfully');
    // }

    /**
     * Display the specified User.
     * GET|HEAD /users/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var User $user */
        $user = $this->userRepository->findOrFail($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        return $this->sendResponse(new UserResource($user), 'User retrieved successfully');
    }

    /**
     * Update the specified User in storage.
     * PUT/PATCH /users/{id}
     *
     * @param int $id
     * @param UpdateUserAPIRequest $request
     *
     * @return Response
     */
    // public function update($id, Request $request)
    public function update($id, Request $request)
    {
        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $input = $request->only([
            // User field
            'username',
            'phone',
            'image_path',

            // Biodata field
            'name', # as fullname
            'fullname',
            'address',
            'gender',
            'picture',
            'school_origin',
            'graduation_year',
            'birth_place',
            'birth_date',
            'identity_number',
            'religion',
        ]);

        try {

            // $user->update($input, $user->id);
            // $user = $user->update($input);

            $this->biodataRepository->firstOrCreate(['user_id' => $id], [
                'fullname' => $input['name'],
                'address' => $input['address'],
                'gender' => $input['gender'],
                'picture' => $input['picture'],
                'school_origin' => $input['school_origin'],
                'graduation_year' => $input['graduation_year'],
                'birth_place' => $input['birth_place'],
                'birth_date' => $input['birth_date'],
                'identity_number' => $input['identity_number'],
                'religion' => $input['religion'],
            ]);
// dd("okesip");
            // $biodata = $this->biodataRepository->findByUser($user->id);

            // if (empty($biodata)) {
            //     $this->biodataRepository->create([
            //         'fullname' => $input['name'],
            //         'address' => $input['address'],
            //         'gender' => $input['gender'],
            //         'picture' => $input['picture'],
            //         'school_origin' => $input['school_origin'],
            //         'graduation_year' => $input['graduation_year'],
            //         'birth_place' => $input['birth_place'],
            //         'birth_date' => $input['birth_date'],
            //         'identity_number' => $input['identity_number'],
            //         'religion' => $input['religion'],
            //     ]);
            // } else {
            //     // Pointing field
            //     $input['fullname'] = empty($input['name']) ? $input['fullname'] : $input['name'];

            //     $biodata->update($input);
            // }
        } catch (Exception $error) {

            return $this->sendError('Error updating data into database!', $error->getMessage());
        }

        return 'oke';
        // return $this->sendResponse(new UserResource($user), 'User updated successfully');

        // $user = $this->userRepository->update($input, $id);

        // return $this->sendResponse(new UserResource($user), 'User updated successfully');
    }

    /**
     * Remove the specified User from storage.
     * DELETE /users/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findOrFail($id);

        if (empty($user)) {
            return $this->sendError('User not found!');
        }

        try {
            $biodata = $this->biodataRepository->findByUser($user->id);

            $biodata->delete();

            $user->delete();
        } catch (Exception $error) {

            return $this->sendError('Error updating data into database!', $error->getCode());
        }

        return $this->sendSuccess('User has been deleted successfully');
    }

    /**
     * Display the detail user logged in .
     * GET|HEAD /countries/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function profile()
    {
        $user = $this->userRepository->find(auth()->id());

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        return $this->sendResponse(new UserResource($user), 'User retrieved successfully');
    }
}

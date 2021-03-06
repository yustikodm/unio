<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserAPIRequest;
use App\Http\Requests\API\UpdateUserAPIRequest;
use App\User;
use App\Models\Biodata;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\UserResource;
use App\Repositories\BiodataRepository;
use Exception;
use Illuminate\Support\Facades\DB;

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

        $user->biodata = Biodata::where('user_id', $id)->first();

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
        
        // return $request->all();
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $user_field = $request->only([
            'username',
            'phone',
            'image_path',
        ]);

        // return $user_field;

        $biodata_field = $request->only([
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
            'religion_id',
        ]);


        DB::beginTransaction();

        try {

            $user->update($user_field);


            if ($biodata_field) {
                $biodata = $this->biodataRepository->createOrUpdate($id, $biodata_field);

                // return $biodata;
            }

        } catch (Exception $error) {
            DB::rollback();
            
            return $this->sendError('Error updating data into database!'.$error->getMessage());
        }

        DB::commit();

        $user->biodata = Biodata::where('user_id', $id)->first();

        return $this->sendResponse(new UserResource($user), 'User updated successfully');
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

    public function setHC($id, Request $request)
    {
        /** @var User $user */
        
        // return $request->all();
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $hc = $request->hc;

        $validateHC = str_split($hc);

        $hcdefault = ['R', 'I', 'A', 'S', 'E', 'C'];
        
        foreach ($validateHC as $row) {        
            $check = array_search($row, $hcdefault);
            if($check === false){
                return $this->sendError('Holland Code not registered');
            }
        }

        $checkDuplicate = array_count_values($validateHC);

        foreach ($checkDuplicate as $row) {
            if($row != 1){
                return $this->sendError('Duplicated Holland Code');
            }
        }

        Biodata::where('user_id', $id)->update(['hc' => $hc]);

        $user->biodata = Biodata::where('user_id', $id)->first();

        return $this->sendResponse(new UserResource($user), 'User retrieved successfully');
    }
}

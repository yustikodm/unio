<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\UpdateUserAPIRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use App\Repositories\BiodataRepository;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAPIConctroller extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    private $biodataRepository;

    public function __construct(UserRepository $userRepo, BiodataRepository $biodataRepo)
    {
        $this->userRepository = $userRepo;

        $this->biodataRepository = $biodataRepo;
    }

    public function index(Request $request)
    {
        $user = $this->userRepository->paginate(15, [], ['name' => $request->name]);

        // return $this->sendResponse($users, 'Users retrieved successfully');
        return $this->sendResponse($user, 'User retrieved successfully');
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

    /**
     * Display the specified user.
     * GET|HEAD /countries/{id}
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

    public function update($id, UpdateUserAPIRequest $request)
    {
        $user = $this->userRepository->findOrFail($id);

        if (empty($user)) {
            return $this->sendError('User not found!');
        }

        try {

            $input = $request->only([
                // User field
                'username',
                'email',
                'password',
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
            if(!empty($input['password'])){
                $input['password'] = Hash::make($input['password']);
            }            

            $this->userRepository->update($id, $input);

            $biodata = $this->biodataRepository->findByUser($user->id);

            if (empty($biodata)) {
                $this->biodataRepository->create([
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
            } else {
                // Pointing field
                $input['fullname'] = empty($input['name']) ? $input['fullname'] : $input['name'];

                $biodata->update($input);
            }
        } catch (Exception $error) {

            return $this->sendError('Error updating data into database!', $error->getCode());
        }

        return $this->sendResponse(new UserResource($user), 'User updated successfully');
    }

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

    public function changePassword(Request $request)
    {
        $user = $this->userRepository->find(auth()->id());

        if (empty($user)) {
            return $this->sendError('User not found!');
        }

        $input = $request->only([
            'current_password',
            'new_password',
            'confirm_password'
        ]);

        if (!Hash::check($input['current_password'], $user->password)) {
            return $this->sendError('Password didn\'t correct with your old password!', 406);
        }

        if ($input['new_password'] != $input['confirm_password']) {
            return $this->sendError('Password and confirmation password didn\'t match!', 406);
        }

        $user->update(['password' => Hash::make($input['new_password'])]);

        return $this->sendSuccess('Password has been updated successfully');
    }
}

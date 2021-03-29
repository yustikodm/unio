<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Response;

class UserAPIConctroller extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
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
}

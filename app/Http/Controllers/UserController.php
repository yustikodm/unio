<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\BiodataRepository;
use App\Repositories\UserRepository;
use App\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Laracasts\Flash\Flash;

class UserController extends AppBaseController
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
   * Display a listing of the Post.
   *
   * @param  UserDataTable  $userDataTable
   * @return JsonResponse|View
   */
  public function index(UserDataTable $userDataTable)
  {
    return $userDataTable->render('users.index');
  }

  /**
   * Show the form for creating a new User.
   *
   * @return Response
   */
  public function create()
  {
    return view('users.create');
  }

  /**
   * Store a newly created User in storage.
   *
   * @param  CreateUserRequest  $request
   *
   * @throws Exception
   *
   * @return RedirectResponse|Redirector
   */
  public function store(CreateUserRequest $request)
  {
    try {
      $input = $request->only([
        'name', // field fullname in biodata table
        'username',
        'email',
        'password',
        'phone',
        'email_verified_at',
        'image_path',
        'roles'
      ]);

      $user = $this->userRepository->store($input);

      if (!empty($input['name'])) {
        $this->biodataRepository->create([
          'user_id' => $user->id,
          'fullname' => $input['name']
        ]);
      }
    } catch (Exception $e) {
      return Redirect::back()->withInput()->withErrors($e->getMessage());
    }

    Flash::success('User saved successfully.');
    
    return redirect(route('users.index'));
  }

  /**
   * Display the specified User.
   *
   * @param  int  $id
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
   * Show the form for editing the specified Video.
   *
   * @param  int  $id
   *
   * @param  Request  $request
   * @return JsonResponse
   */
  public function edit($id, Request $request)
  {
    $user = $this->userRepository->find($id);

    if (empty($user)) {
      Flash::error('User not found');

      return redirect(route('users.index'));
    }

    return view('users.edit', compact('user'));
  }

  /**
   * @param  User  $user
   * @param  UpdateUserRequest  $request
   *
   * @return RedirectResponse|Redirector
   */
  public function update(User $user, UpdateUserRequest $request)
  {
    try {
      $input = $request->only([
        'username',
        'email',
        'password',
        'phone',
        'email_verified_at',
        'image_path',
        'roles'
      ]);

      $user = $this->userRepository->update($user->id, $input);
    } catch (Exception $e) {
      return Redirect::back()->withInput()->withErrors($e->getMessage());
    }

    Flash::success('User updated successfully.');
    
    return redirect(route('users.index'));
  }

  /**
   * Remove the specified User from storage.
   *
   * @param  User  $user
   *
   * @throws Exception
   *
   * @return JsonResponse
   */
  public function destroy(User $user)
  {
    $user->delete();

    return $this->sendSuccess('User deleted successfully.');
  }

  /**
   * @return mixed
   */
  public function editProfile()
  {
    try {
      $user = $this->userRepository->findWithoutFail(auth()->id());

      return view('profile.edit', compact('user'));
    } catch (Exception $e) {
      return Redirect::back()->withErrors([$e->getMessage()]);
    }
  }

  /**
   * @param  UpdateUserProfileRequest  $request
   *
   * @return RedirectResponse|Redirect
   */
  public function updateProfile(UpdateUserProfileRequest $request)
  {
    try {
      $user = $this->userRepository->findWithoutFail(auth()->id());
      if (empty($user)) {
        Flash::error('User not found');

        return redirect(route('users.index'));
      }
      $input = $request->all();
      $this->userRepository->updateProfile($input);
      Flash::success('Profile updated successfully.');

      return redirect('users');
    } catch (Exception $e) {
      return Redirect::back()->withErrors([$e->getMessage()])->withInput($request->all());
    }
  }

  /**
   * Show current user profile (data based from login)
   *
   * @param [type] $id
   * @return void
   */
  public function profile()
  {
    $user = $this->userRepository->find(auth()->id());

    return view('users.show')->with('user', $user);
  }
}

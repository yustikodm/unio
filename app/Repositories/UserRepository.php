<?php

namespace App\Repositories;


use App\Exceptions\ApiOperationFailedException;
use App\Models\Biodata;
use App\Traits\ImageTrait;

use App\User;
use Illuminate\Support\Facades\DB;

use Exception;
use Illuminate\Support\Facades\Hash;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Illuminate\Support\Str;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version February 20, 2020, 7:15 am UTC
 */
class UserRepository extends BaseRepository
{
  /**
   * @var array
   */
  protected $fieldSearchable = [
    'username',
    'email',
    'phone',
  ];

  /**
   * Return searchable fields
   *
   * @return array
   */
  public function getFieldsSearchable()
  {
    return $this->fieldSearchable;
  }

  /**
   * Configure the Model
   **/
  public function model()
  {
    return User::class;
  }

  /**
   * @param  array  $input
   *
   * @throws Exception
   *
   * @return bool
   */
  public function store($input)
  {
    DB::beginTransaction();
    
    try {
      $input = $this->validateInput($input);

      if (isset($input['image_path']) && !empty($input['image_path'])) {
        $input['image_path'] = ImageTrait::makeImage($input['image_path'], User::IMAGE_PATH);
      }

      if (empty($input['username'])) {
        $input['username'] = explode('@', $input['email'])[0];
      }

      $user = User::create($input);

      // Biodata
      if (!empty($input['name'])) {
        Biodata::create([
          'user_id' => $user->id,
          'fullname' => $input['name']
        ]);
      }
      
      // if empty roles
      if (empty($input['roles'])) {
        $input['roles'] = ['student'];
      }

      // Spatie [Sync Role User]
      $user->assignRole($input['roles']);
    } catch (Exception $e) {
      DB::rollBack();
      
      throw new BadRequestHttpException($e->getMessage());
    }

    DB::commit();

    return $user;
  }

  /**
   * @param  int  $id
   * @param  array  $input
   *
   * @throws Exception
   *
   * @throws ApiOperationFailedException
   * @return User
   */
  public function update($id, $input)
  {
    /** @var User $user */
    $user = $this->findOrFail($id);
    
    DB::beginTransaction();

    try {
      $input = $this->validateInput($input);
      
      if (isset($input['photo']) && !empty($input['photo'])) {
        $user->deleteImage();

        $input['image_path'] = ImageTrait::makeImage($input['photo'], User::IMAGE_PATH);
      }

      $user->update($input);

      // if empty roles
      $input['roles'] = isset($input['roles']) ? $input['roles'] : ['student'];

      // Spatie [Sync Role User]
      DB::table('model_has_roles')->where('model_id', $user->id)->delete();
      $user->assignRole($input['roles']);

    } catch (Exception $e) {
      DB::rollBack();

      throw new ApiOperationFailedException($e->getMessage());
    }

    DB::commit();

    return $user;
  }

  /**
   * @param  array  $input
   *
   * @return mixed
   */
  public function validateInput($input)
  {
    if (!empty($input['password'])) {
      $input['password'] = Hash::make($input['password']);
    } else {
      unset($input['password']);
    }

    return $input;
  }

  /**
   * @param  array  $input
   *
   * @return ApiOperationFailedException|User
   */
  public function updateProfile($input)
  {
    try {
      $input = $this->validateInput($input);
      /** @var User $user */
      $user = User::find(auth()->id());

      if (isset($input['photo']) && !empty($input['photo'])) {
        $input['image_path'] = ImageTrait::makeImage(
          $input['photo'],
          User::IMAGE_PATH,
          ['width' => 150, 'height' => 150]
        );

        $imagePath = $user->image_path;
        if (!empty($imagePath)) {
          $user->deleteImage();
        }
      }

      $user->update($input);

      return $user;
    } catch (Exception $e) {
      return new ApiOperationFailedException('Unable to Update Profile' . $e->getMessage(), $e->getCode());
    }
  }
}

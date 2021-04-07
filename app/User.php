<?php

namespace App;

use App\Models\Article;
use App\Models\Biodata;
use App\Models\Family;
use App\Models\PointTopup;
use App\Models\QuestionnaireAnswer;
use App\Models\Wishlist;
use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\User.
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string|null $phone
 * @property Carbon|null $email_verified_at
 * @property string|null $password
 * @property int|null $created_by
 * @property bool $set_password
 * @property int $is_email_verified
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIsEmailVerified($value)
 * @method static Builder|User whereUsername($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePhone($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereSetPassword($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @property string $image
 * @method static Builder|User whereImagePath($value)
 * @mixin Eloquent
 * @property string $image_path
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 */
class User extends Authenticatable
{
  use HasRoles, Notifiable, ImageTrait;
  
  use ImageTrait {
    deleteImage as traitDeleteImage;
  }

  public $table = 'users';
  const IMAGE_PATH = 'users';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'username',
    'email',
    'password',
    'phone',
    'email_verified_at',
    'image_path',
    'api_token'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'set_password'      => 'boolean',
    'image_path'      => 'string',
  ];

  /**
   * Validation rules.
   *
   * @var array
   */
  public static $rules = [
    'username'              => 'required|unique:users,username',
    'email'                 => 'required|email|unique:users,email|regex:/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/',
    'phone'                 => 'nullable|numeric|min:5',
    'password'              => 'nullable|min:6|required_with:password_confirmation|same:password_confirmation',
    'password_confirmation' => 'nullable|min:6',
    'roles'                 => 'required|min:1'
  ];

  public static $messages = [
    // 'phone.digits'     => 'The phone number must be 10 digits long.',
    'email.regex'      => 'Please enter valid email.',
    'photo.mimes'      => 'The profile image must be a file of type: jpeg, jpg, png.',
  ];

  public static $setPasswordRules = [
    'user_id'               => 'required',
    'password'              => 'min:6|required_with:password_confirmation|same:password_confirmation',
    'password_confirmation' => 'min:6',
  ];

  public function article()
  {
    return $this->hasMany(Article::class);
  }

  public function questionnaireAnswer()
  {
    return $this->hasMany(QuestionnaireAnswer::class);
  }

  public function biodata()
  {
    return $this->hasOne(Biodata::class);
  }

  public function parent()
  {
    return $this->hasMany(Family::class, 'parent_user');
  }

  public function child()
  {
    return $this->hasMany(Family::class, 'child_user');
  }

  public function transaction()
  {
    return $this->hasMany(PointTransaction::class);
  }

  public function topup()
  {
    return $this->hasMany(PointTopup::class);
  }

  public function wishlist()
  {
    return $this->hasMany(Wishlist::class);
  }

  /**
   * @param $value
   *
   * @return string
   */
  public function getImagePathAttribute($value)
  {
    if (!empty($value)) {
      return $this->imageUrl(self::IMAGE_PATH . DIRECTORY_SEPARATOR . $value);
    }

    return getUserImageInitial($this->id, $this->username);
  }

  /**
   * @return bool
   */
  public function deleteImage()
  {
    $image = $this->getOriginal('image_path');
    if (empty($image)) {
      return true;
    }

    return $this->traitDeleteImage(self::IMAGE_PATH . DIRECTORY_SEPARATOR . $image);
  }
}

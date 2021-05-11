<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Article
 * @package App\Models
 * @version March 5, 2021, 5:11 pm WIB
 *
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property integer $user_id
 * @property string $picture
 */
class Article extends Model
{
  use SoftDeletes;

  public $table = 'articles';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $dates = ['deleted_at'];

  public $fillable = [
    'title',
    'slug',
    'description',
    'user_id',
    'picture'
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'title' => 'string',
    'slug' => 'string',
    'description' => 'string',
    'user_id' => 'integer',
    'picture' => 'string'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'title' => 'required|string|max:255',
    'slug' => 'string',
    'description' => 'required|string',
    'user_id' => 'required|nullable|integer',
    'picture' => 'nullable|string|max:255',
    'created_at' => 'nullable',
    'updated_at' => 'nullable',
    'deleted_at' => 'nullable'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function scopeApiSearch($query, $name, $slug="")
  {
    $search = $query->when($name, function ($query) use ($name) {
      return $query->where('articles.title', 'LIKE', "%$name%");
    })
    ->when($slug, function ($query) use ($slug) {
      return $query->where('articles.slug', 'LIKE', "%$slug%");
    });

    $select_list = ['articles.*'];   

    return $search->select($select_list)->with('user');
  }
}

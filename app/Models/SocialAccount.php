<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialAccount extends Model
{
    use SoftDeletes;
    
    public $table = 'social_accounts';

    public $fillable = ['user_id', 'provider_id', 'provider_name'];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'provider_id' => 'string',
        'provider_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required|integer',
        'user_id' => 'required|integer',
        'provider_id' => 'required|integer',
        'provider_name' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getExistSocial($socialId, $socialName)
    {
      return static::where('provider_id', $socialId)
                  ->where('provider_name', $socialName)
                  ->first();
    }
}

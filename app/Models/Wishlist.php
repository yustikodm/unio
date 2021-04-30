<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Wishlist
 * @package App\Models
 * @version March 3, 2021, 11:44 pm WIB
 *
 * @property integer $university_id
 * @property integer $major_id
 * @property integer $service_id
 * @property integer $user_id
 * @property string $description
 */
class Wishlist extends Model
{
    use SoftDeletes;

    public $table = 'wishlists';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'entity_id',
        'entity_type',
        'user_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'entity_id' => 'integer',
        'entity_type' => 'string',
        'user_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'entity_id' => 'required|integer',
        'entity_type' => 'required|string',
        'user_id' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currentUser()
    {
        return static::where('user_id', auth()->id())->get();
    }

    public function vendor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Vendor::class, 'entity_id');
    }

    public function service(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(VendorService::class, 'entity_id');
    }

    public function university(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(University::class, 'entity_id');
    }

    public function major(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UniversityMajor::class, 'entity_id');
    }
}

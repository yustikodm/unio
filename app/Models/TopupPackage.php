<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TopupPackage
 * @package App\Models
 * @version April 29, 2021, 9:28 pm WIB
 *
 * @property \Illuminate\Database\Eloquent\Collection $topupHistories
 * @property string $code
 * @property string $name
 * @property string $description
 * @property integer $amount
 * @property string|\Carbon\Carbon $due_date
 * @property string $status
 */
class TopupPackage extends Model
{
    use SoftDeletes;

    public $table = 'topup_packages';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'code',
        'name',
        'description',
        'amount',
        'due_date',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'description' => 'string',
        'amount' => 'integer',
        'due_date' => 'datetime',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'nullable|string|unique:topup_packages,code',
        'name' => 'required|string|',
        'description' => 'nullable|string',
        'amount' => 'required|integer',
        'due_date' => 'nullable',
        'status' => 'required|string|',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function history()
    {
        return $this->hasMany(TopupHistory::class);
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UniversityFacility
 * @package App\Models
 * @version April 14, 2021, 3:47 pm WIB
 *
 * @property int $university_id
 * @property string $name
 * @property logtext $description
 * @property int $amount
 */
class UniversityFacility extends Model
{
    use SoftDeletes;

    public $table = 'university_facilities';    

    protected $dates = ['deleted_at'];

    public $fillable = ['university_id', 'name', 'description', 'amount'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'university_id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'amount' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'university_id' => 'required|integer',
        'name' => 'required|string',
        'description' => 'nullable|string',
        'amount' => 'required|integer'
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}

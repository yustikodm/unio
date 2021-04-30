<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * Class Cart
 * @package App\Models
 * @version March 3, 2021, 11:45 pm WIB
 *
 * @property integer $user_id
 * @property integer $service_id
 * @property string $name
 * @property integer $qty
 * @property integer $price
 * @property integer $total_price
 */
class Cart extends Model
{
    use SoftDeletes;

    public $table = 'carts';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'user_id',
        'entity_id',
        'entity_type',
        'qty',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'entity_id' => 'integer',
        'entity_type' => 'string',
        'qty' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|integer',
        'entity_id' => 'required|integer',
        'entity_type' => 'required|string',
        'qty' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getByUserLogin()
    {
        $services = DB::table('carts')
            ->where('user_id', auth()->id())
            ->where('carts.entity_type', 'services')
            ->join('vendor_services', 'vendor_services.id', 'carts.entity_id')
            ->join('point_pricings', function ($join) {
                $join->on('vendor_services.id', '=', 'point_pricings.entity_id')
                    ->where('point_pricings.entity_type', 'services');
            })
            ->select('carts.id as cart_id', 'carts.entity_id', 'carts.entity_type', 'carts.qty', 'vendor_services.name as name', 'point_pricings.amount', 'carts.created_at', 'carts.updated_at', 'carts.user_id');

        $lives = DB::table('carts')
            ->where('user_id', auth()->id())
            ->where('carts.entity_type', 'lives')
            ->join('place_to_live', 'place_to_live.id', 'carts.entity_id')
            ->join('point_pricings', function ($join) {
                $join->on('place_to_live.id', '=', 'point_pricings.entity_id')
                    ->where('point_pricings.entity_type', 'lives');
            })
            ->select('carts.id as cart_id', 'carts.entity_id', 'carts.entity_type', 'carts.qty', 'place_to_live.name as name', 'point_pricings.amount', 'carts.created_at', 'carts.updated_at', 'carts.user_id');

        $services->union($lives);

        $builder = DB::table(DB::raw("({$services->toSql()}) AS a"))
            ->mergeBindings($services)
            ->select(['cart_id', 'entity_id', 'entity_type', 'qty', 'name', 'amount', 'created_at', 'updated_at', 'user_id']);

        return $builder->get();
    }

    public function service(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(VendorService::class, 'entity_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    public $table = 'social_accounts';

    public $fillable = ['user_id', 'provider_id', 'provider_name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

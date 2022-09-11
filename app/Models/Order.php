<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use app\Models\Chef;
use app\Models\User;

class Order extends Model
{
    use HasFactory;

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
    public function chef(): HasOne
    {
        return $this->hasOne(Chef::class);
    }
}

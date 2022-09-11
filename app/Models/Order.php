<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'chef_id',
        'description',
        'title',
        'price'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chef()
    {
        return $this->belongsTo(Chef::class);
    }
}

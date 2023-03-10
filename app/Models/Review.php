<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Restaurant;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_name',
        'restaurant_id',
        'restaurant_name',
        'star',
        'feedback',
    ];

    public function username()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function restaurantname()
    {
        return $this->belongsTo(Restaurant::class,'restaurant_id');
    }    
}

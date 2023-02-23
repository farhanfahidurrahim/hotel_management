<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;
use App\Models\Hotelroom;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'hotel_id',
        'room_id',
        'check_in',
        'check_out',
        'distance',
        'numberof_room',
        'original_price',
        'discount',
        'final_price',
        'status',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class,'hotel_id');
    }

    public function hotelroom()
    {
        return $this->belongsTo(Hotelroom::class,'room_id');
    }
}

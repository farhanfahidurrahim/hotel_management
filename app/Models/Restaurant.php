<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurantmenu;
use App\Models\Restaurantrating;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['name','division_id','location','description','discount','latitude','longitude','contact_no','facebook_page','website_link','youtube_link','photo','tags','status','popular_deal'];

    public function restaurantmenu()
    {
        return $this->hasMany(Restaurantmenu::class);
    }

    public function restaurantrating()
    {
        return $this->hasOne(Restaurantrating::class);
    }

    public function restaurantreview()
    {
        return $this->hasMany(Review::class,'restaurant_id');
    }
}

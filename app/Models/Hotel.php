<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Division;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ['name','division_id','location','description','price','offer_price','discount','latitude','longitude','contact_no','facebook_page','website_link','youtube_link','photo','tags','services','status','popular_deal',];

    public function division()
    {
        return $this->belongsTo(Division::class,'division_id');
    }
}

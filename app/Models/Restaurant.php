<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['name','division_id','location','description','discount','latitude','longitude','contact_no','facebook_page','youtube_link','photo','tags','status'];
}

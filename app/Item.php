<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name','slug','content','price','published','user_id','category_id','created_at','updated_at']; 
}

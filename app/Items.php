<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $fillable = ['name','slug','content','price','published','user_id','category_id','created_at','updated_at']; 

    public function user(){
        return $this->belongsTo('App\User');
    }

}

<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    //
    //الطريقة الأولى الأشياء الي اريدهن يتعبين
    protected $fillable = [
    'name',
    'email',
    'phone',
    'msg',
    'building_number',
    'apartment_number',
    'user_id'];
    
    //الطريقة الثانية الأشياء الي ما أريدهن يتعبين
    //protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class);
    }
}

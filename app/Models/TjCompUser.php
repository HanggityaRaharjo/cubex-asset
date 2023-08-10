<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TjCompUser extends Model
{
    use HasFactory;

    protected $table   = 'tj_comp_user';
    protected $guarded = [];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(TtUser::class,'user_id');
    }

    public function users(){
        return $this->hasMany(TtUser::class,'user_id');
    }

    public function deleteuser(){
       return  $this->user()->delete();
        // return $this->delete();
    }
}

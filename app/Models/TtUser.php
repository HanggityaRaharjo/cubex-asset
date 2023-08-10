<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TtUser extends Model
{
    use HasFactory;
    protected $table   = 'tt_user';
    protected $guarded = [];
    public $timestamps = false;

    public function companies(){
        return $this->hasMany(TjCompUser::class,'company_id');
    }


    public function contacts(){
        return $this->hasMany(TtContact::class,'user_id');
    }

    public function delcon(){
        return $this->contacts()->delete();
    }
}

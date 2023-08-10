<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TtContact extends Model
{
    use HasFactory;
    protected $table   = 'tt_contact';
    protected $guarded = [];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(TtUser::class,'user_id');
    }
}

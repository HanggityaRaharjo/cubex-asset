<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table   = 'tt_company';
    protected $guarded = [];
    public $timestamps = false;

    public function users(){
        return $this->hasMany(TjCompUser::class,'company_id');
    }
}

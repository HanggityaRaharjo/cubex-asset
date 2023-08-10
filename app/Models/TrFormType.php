<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrFormType extends Model
{
    use HasFactory;
    protected $table   = 'tr_form_type';
    protected $guarded = [];
    public $timestamps = false;

    public function forms(){
        return $this->hasMany(TtForm::class,'type_id');
    }
}

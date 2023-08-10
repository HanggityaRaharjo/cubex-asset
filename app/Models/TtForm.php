<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TtForm extends Model
{
    use HasFactory;
    protected $table   = 'tt_form';
    protected $guarded = [];
    public $timestamps = false;

    public function type(){
        return $this->belongsTo(TrFormType::class,'type_id');
    }

    public function company(){
        return $this->belongsTo(Company::class,'company_id');
    }

    public function status(){
        return $this->belongsTo(StatusRef::class,'status_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThLoginTrx extends Model
{
    use HasFactory;
    protected $table   = 'tt_login';
    protected $guarded = [];
    public $timestamps = ['created_at'];
}

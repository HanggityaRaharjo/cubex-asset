<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passwords extends Model
{
    use HasFactory;
    protected $table   = 'tt_password';
    protected $guarded = [];
    public $timestamps = false;
}

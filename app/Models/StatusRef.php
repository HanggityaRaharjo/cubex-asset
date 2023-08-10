<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusRef extends Model
{
    use HasFactory;
    protected $table   = 'tr_status';
    protected $guarded = [];
    public $timestamps = false;
}

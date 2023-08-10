<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesLead extends Model
{
    use HasFactory;
    protected $table   = 'tt_lead_company';
    protected $guarded = [];
    public $timestamps = false;
}

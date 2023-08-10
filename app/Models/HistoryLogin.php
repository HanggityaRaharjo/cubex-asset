<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryLogin extends Model
{
    use HasFactory;

    const STATUS_BERHASIL = 1;
    const STATUS_USER_TIDAK_DITEMUKAN = 2;
    const STATUS_PASSWORD_SALAH = 3;
    const STATUS_DOMAIN_TIDAK_DITEMUKAN = 4;
    const STATUS_USER_BELUM_AKTIF = 5;


    protected $table   = 'th_login';
    protected $guarded = [];
    public $timestamps = false;

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('d F Y H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status()
    {
        return $this->belongsTo(StatusRef::class, 'status_id');
    }
}

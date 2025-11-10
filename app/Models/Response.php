<?php

namespace App\Models;

use App\Models\User;
use App\Models\Complains;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $table = 'responses';

    protected $fillable = [
        'complain_id',
        'user_id',
        'response'
    ];

    public function dataKomplen() {
        return $this->belongsTo(Complains::class, 'complain_id', 'id');
    }

    public function namaAdmin() {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }
}
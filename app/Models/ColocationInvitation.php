<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Colocation;

class ColocationInvitation extends Model
{
    protected $fillable = [
        'email',
        'colocation_id',
        'token',
    ];

    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }
}

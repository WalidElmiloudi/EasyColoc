<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColocationInvitation extends Model
{
        protected $fillable = [
        'email',
        'colocation_id',
        'token',
    ];//
}

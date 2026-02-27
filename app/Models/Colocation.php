<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    protected $fillable = ['name', 'owner_id','join_token'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

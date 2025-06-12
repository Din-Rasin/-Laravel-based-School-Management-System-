<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name'];

    // If you need the ministry relationship later
    public function ministry()
    {
        // return $this->hasMany(Ministry::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intake extends Model
{
    public function client() {

        return $this->hasOne(Client::class);

    }

    public function user() {

        return $this->belongsTo(User::class);

    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    public function company() {

        return $this->belongsTo(Company::class);

    }

    public function user() {

        return $this->belongsTo(User::class);

    }

    public function intake() {

        return $this->belongsTo(Intake::class);

    }

    public function profile() {

        return $this->hasOne(Profile::class);

    }
}

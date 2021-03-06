<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    public function scopeIncomplete($query) {

        return $query->where('completed', 0);

    }

    public function user() {

        return $this->belongsTo(User::class);

    }

    public function company() {

        return $this->belongsTo(Company::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
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

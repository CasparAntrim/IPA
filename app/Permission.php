<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
// use \Spatie\Permission\Models\Permission;

class Permission extends \Spatie\Permission\Models\Permission
{
    public static function defaultPermissions() {
        return [
            'viewProfile',
            'editProfile',
        ];
    }
}

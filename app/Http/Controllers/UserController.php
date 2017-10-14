<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware(['role:super-admin|admin','permission:create users']);
        $this->middleware(['role:super-admin|admin']);
    }

    public function index() {

        return view('user.index');

    }

    public function show(User $req_user) {

        return view('user.show', compact('req_user'));

    }

    public function update() {
        //
    }

    public function create() {

        $role = Role::get();

        return view('user.create', compact('role'));

    }

    public function store() {

        // Validate and apply roles/permissions here

    }

    public function manage() {

        return view('user.manage');

    }
}

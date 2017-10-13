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

    public function edit() {
        //
    }

    public function create() {

        return view('user.create');

    }

    public function store() {

        //

    }

    public function manage() {

        return view('user.manage');

    }
}

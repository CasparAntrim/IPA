<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function create() {

        $role = Role::get('client');

        return view('client.create', compact('role'));

    }

    public function store(Request $request) {

        $this->validate($request, [
            'fname'     =>      'required',
            'lname'     =>      'required',
            'username'  =>      'required|max:16|unique:user,client',
            'email'     =>      'required|email|unique:users,clients',
            'password'  =>      'required|min:6|confirmed',
        ]);

        $client = Client::create($request->only('fname', 'lname', 'username', 'email', 'password'));
        $client->assignRole('client');

        return "Client made, motha fucka";

    }
}

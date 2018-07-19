<?php

namespace App\Http\Repository;

use App\User;
use Illuminate\Http\Request;

class UserRepository
{
    public function add(Request $request)
    {
        $user = new User();
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return $user;
    }

    public function getAll()
    {
        return User::all();
    }

    public function getById($userId)
    {
        return User::find($userId);
    }

    public function delete($user)
    {
        $user->delete();
    }
}
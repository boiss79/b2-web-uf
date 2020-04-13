<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){

        return view('admin.users.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Method to remove an user
     *
     * @param User $user
     * @return void
     */
    public function destroy(User $user){
        $user->delete();

        return redirect()->route('admin.users.index')->with('green', 'L\'utilisateur a bien été supprimé.');
    }
}

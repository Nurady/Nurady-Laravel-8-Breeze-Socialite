<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, User $user)
    {
        // return  $user->statuses()->latest()->get();
        return view('users.show', [
            'user' => $user,
            'statuses' => $user->statuses()->latest()->get(),
        ]);
    }
}

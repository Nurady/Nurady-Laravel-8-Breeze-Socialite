<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{
    public function following(User $user)
    {
        // dd(Auth::user()->hasFollow($user));
        return view('users.following', [
            'following' => $user->follows,
            // 'followers' => $user->followers,
            'user' => $user,
        ]);
    }

    public function followers(User $user)
    {
        return view('users.following', [
            // 'following' => $user->followers,
            'followers' => $user->followers,
            'user' => $user,
        ]);
    }

    public function store(Request $request, User $user)
    {
        // dd($user);
        // if(Auth::user()->hasFollow($user)) {
        //     Auth::user()->unFollow($user);
        // } else {
        //     Auth::user()->follow($user);
        // }

        Auth::user()->hasFollow($user) ? Auth::user()->unFollow($user) : Auth::user()->follow($user);
        return back()->with('success', 'berhasil menambahkan teman');
    }
}

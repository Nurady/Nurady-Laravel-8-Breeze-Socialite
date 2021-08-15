<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{
    public function edit()
    {
        return view('users.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:191'],
            'email' => ['required', 'email', 'string', 'unique:users,email,' . auth()->id()],
        ]);

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // return back()->with('success','berhasil ubah profile');
        return redirect()
            ->route('profile', auth()->user()->name)
            ->with('success','berhasil ubah profile');
    }
}

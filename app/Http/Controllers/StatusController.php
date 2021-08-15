<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StatusRequest;

class StatusController extends Controller
{
    public function store(StatusRequest $request)
    {
        // $data = $request->all();
        // $data['identifier'] = Str::random(32);
        Auth::user()->makeStatus($request->body);
        return back();
    }
}

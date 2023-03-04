<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ReaderController extends Controller
{
    public function register()
    {

        $reader = Reader::create([
            'name' => request()->name,
            'email' => request()->email,
            'password' => Hash::make(request()->password),
            'cat_id' => request()->cat_id
        ]);
        return $reader;
    }
    public function login()
    {
        $user = Reader::where('email', request()->email)->first();
        if (!$user || !Hash::check(request()->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return $user;
    }
}

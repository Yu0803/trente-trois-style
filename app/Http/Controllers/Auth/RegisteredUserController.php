<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'            => 'required|string|max:255',
            'last_name'             => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|string|min:8|confirmed',
            'phone'                 => 'nullable|string|max:20',
            'country_code'          => 'nullable|string|max:10',
            'dob'                   => 'nullable|date',
            'address1'              => 'nullable|string|max:255',
            'address2'              => 'nullable|string|max:255',
            'postal_code'           => 'nullable|string|max:20',
            'country'               => 'nullable|string|max:100',
            'terms'                 => 'accepted'
        ]);

        User::create([
           'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'phone'         => $request->phone,
            'country_code'  => $request->country_code,
            'dob'           => $request->dob,
            'address1'      => $request->address1,
            'address2'      => $request->address2,
            'postal_code'   => $request->postal_code,
            'country' => $request->country_code,
        ]);

        return redirect()->route('home')->with('success', 'Registration complete!');
    }
}

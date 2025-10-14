<?php

namespace App\Http\Controllers;

class AdmissionController extends Controller
{
    public function create()
    {
        return view('admission.create');
    }

    // public function store(Request $request)
    // {

    //     $validated = $request->validate([
    //         'name'     => ['required', 'string', 'max:255'],
    //         'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
    //         'phone'    => ['required', 'string', 'regex:/^01[3-9][0-9]{8}$/'],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],

    //         // User profile validation
    //         'address'  => ['required', 'string', 'max:255'],
    //         'city'     => ['required', 'string', 'max:255'],
    //         'country'  => ['required', 'string', 'max:255'],
    //         'dob'      => ['required', 'date'],
    //         'facebook' => ['required', 'string', 'max:255'],
    //         'linkedin' => ['required', 'string', 'max:255'],
    //     ]);

    //     // 🟩 ১. Create user
    //     $user = User::create([
    //         'name'     => $validated['name'],
    //         'phone'    => $validated['phone'],
    //         'email'    => $validated['email'],
    //         'password' => Hash::make($validated['password']),
    //     ]);

    //     // 🟦 ২. Create user profile (One-to-One)
    //     $user->profile()->create([
    //         'address'       => $validated['address'],
    //         'city'          => $validated['city'],
    //         'country'       => $validated['country'],
    //         'date_of_birth' => $validated['dob'],
    //         'facebook'      => $validated['facebook'],
    //         'linkedin'      => $validated['linkedin'],
    //     ]);

    //     // 🟨 ৩. Fire registration event + login user
    //     event(new Registered($user));
    //     Auth::login($user);

    //     // 🟩 ৪. Redirect after registration
    //     return redirect(route('dashboard', absolute: false));
    // }
}

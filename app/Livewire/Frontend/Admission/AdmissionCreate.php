<?php

namespace App\Livewire\Frontend\Admission;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Component;

class AdmissionCreate extends Component
{
    // 🧠 Public properties for two-way binding
    public $name;

    public $email;

    public $phone;

    public $password;

    public $password_confirmation;

    public $address;

    public $city;

    public $country;

    public $dob;

    public $gender;

    public $facebook;

    public $linkedin;

    // 🧱 Validation rules (Livewire style)
    protected function rules()
    {
        return [
            // User fields
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'regex:/^01[3-9][0-9]{8}$/'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

            // Profile fields
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:male,female,other'],
            'dob' => ['required', 'date'],
            'facebook' => ['required', 'string', 'max:255'],
            'linkedin' => ['required', 'string', 'max:255'],
        ];
    }

    // 🧩 Store method
    public function store()
    {
        $this->validate();

        // Create user
        $user = User::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->assignRole('student');

        // Create user profile
        $user->profile()->create([
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'dob' => $this->dob,
            'gender' => $this->gender,
            'facebook' => $this->facebook,
            'linkedin' => $this->linkedin,
        ]);

        // Fire registration event + login user
        event(new Registered($user));
        Auth::login($user);

        // Redirect after registration
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.frontend.admission.admission-create');
    }
}

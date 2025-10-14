<div class="py-8">
    <div class="text-center text-4xl font-bold my-8">
        <h1>Admission Going On</h1>
    </div>
    <div class="max-w-4xl mx-auto">
        <form wire:submit.prevent="store">

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input wire:model="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" wire:model="phone"
                    :value="old('phone')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" wire:model="email"
                    :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" wire:model="address"
                    :value="old('address')" required autofocus autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- City -->
            <div class="mt-4">
                <x-input-label for="city" :value="__('City')" />
                <x-text-input id="city" class="block mt-1 w-full" type="text" wire:model="city"
                    :value="old('city')" required autofocus autocomplete="city" />
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>

            <!-- Country -->
            <div class="mt-4">
                <x-input-label for="country" :value="__('Country')" />
                <x-text-input id="country" class="block mt-1 w-full" type="text" wire:model="country"
                    :value="old('country')" required autofocus autocomplete="country" />
                <x-input-error :messages="$errors->get('country')" class="mt-2" />
            </div>

            <!-- Date of Birth -->
            <div class="mt-4">
                <x-input-label for="dob" :value="__('Date of Birth')" />
                <x-text-input id="dob" class="block mt-1 w-full" type="date" wire:model="dob"
                    :value="old('dob')" required autofocus autocomplete="city" />
                <x-input-error :messages="$errors->get('dob')" class="mt-2" />
            </div>

            <!-- Gender -->
            <div class="mt-4">
                <x-input-label for="dob" :value="__('Gender')" />
                <select wire:model.defer="gender" class="w-full border rounded p-2">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>


            <!-- Facebook -->
            <div class="mt-4">
                <x-input-label for="facebook" :value="__('Facebook')" />
                <x-text-input id="facebook" class="block mt-1 w-full" type="text" wire:model="facebook"
                    :value="old('facebook')" required autofocus autocomplete="facebook" />
                <x-input-error :messages="$errors->get('facebook')" class="mt-2" />
            </div>

            <!-- Linkedin -->
            <div class="mt-4">
                <x-input-label for="linkedin" :value="__('Linkedin')" />
                <x-text-input id="linkedin" class="block mt-1 w-full" type="text" wire:model="linkedin"
                    :value="old('linkedin')" required autofocus autocomplete="linkedin" />
                <x-input-error :messages="$errors->get('linkedin')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" wire:model="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    wire:model="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 me-4"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                @include('components.wire-loading-btn', [
                    'label' => 'Admite',
                    'methodName' => 'store',
                ])
                {{-- <x-primary-button class="ms-4">
                    {{ __('Admission') }}
                </x-primary-button> --}}
            </div>
        </form>
    </div>
</div>

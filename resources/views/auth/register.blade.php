<x-layout>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @vite(['resources/js/app.js', 'resources/css/app.css'])

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Parent First Name -->
                <div>
                    <x-input-label for="parent_first_name" :value="__('Parent First Name')" />
                    <x-text-input id="parent_first_name" class="block mt-1 w-full" type="text" name="parent_first_name" :value="old('parent_first_name')" required autofocus autocomplete="parent_first_name" />
                    <x-input-error :messages="$errors->get('parent_first_name')" class="mt-2" />
                </div>

                <!-- Parent Last Name -->
                <div class="mt-4">
                    <x-input-label for="parent_last_name" :value="__('Parent Last Name')" />
                    <x-text-input id="parent_last_name" class="block mt-1 w-full" type="text" name="parent_last_name" :value="old('parent_last_name')" required autocomplete="parent_last_name" />
                    <x-input-error :messages="$errors->get('parent_last_name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Phone -->
                <div class="mt-4">
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="phone" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <!-- Zip Code -->
                <div class="mt-4">
                    <x-input-label for="zip_code" :value="__('Zip Code')" />
                    <x-text-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" :value="old('zip_code')" required autocomplete="zip_code" />
                    <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
                </div>

                <!-- Gamer First Name -->
                <div class="mt-4">
                    <x-input-label for="gamer_first_name" :value="__('Gamer First Name')" />
                    <x-text-input id="gamer_first_name" class="block mt-1 w-full" type="text" name="gamer_first_name" :value="old('gamer_first_name')" required autocomplete="gamer_first_name" />
                    <x-input-error :messages="$errors->get('gamer_first_name')" class="mt-2" />
                </div>

                <!-- Gamer Birthday -->
                <div class="mt-4">
                    <x-input-label for="gamer_birthday" :value="__('Gamer Birthday')" />
                    <x-text-input id="gamer_birthday" class="block mt-1 w-full" type="date" name="gamer_birthday" :value="old('gamer_birthday')" required autocomplete="gamer_birthday" />
                    <x-input-error :messages="$errors->get('gamer_birthday')" class="mt-2" />
                </div>

                <!-- Discord -->
                <div class="mt-4">
                    <x-input-label for="discord" :value="__('Discord')" />
                    <x-text-input id="discord" class="block mt-1 w-full" type="text" name="discord" :value="old('discord')" autocomplete="discord" />
                    <x-input-error :messages="$errors->get('discord')" class="mt-2" />
                </div>

                <!-- Games -->
                <div class="mt-4">
                    <x-input-label for="games" :value="__('Games')" />
                    <select id="games" name="games[]" class="select2 block mt-1 w-full" multiple>
                        <option value="Fortnite" {{ in_array('Fortnite', old('games', [])) ? 'selected' : '' }}>Fortnite</option>
                        <option value="Rocket League" {{ in_array('Rocket League', old('games', [])) ? 'selected' : '' }}>Rocket League</option>
                        <option value="Overwatch" {{ in_array('Overwatch', old('games', [])) ? 'selected' : '' }}>Overwatch</option>
                        <option value="Valorant" {{ in_array('Valorant', old('games', [])) ? 'selected' : '' }}>Valorant</option>
                        <option value="League of Legends" {{ in_array('League of Legends', old('games', [])) ? 'selected' : '' }}>League of Legends</option>
                        <option value="Super Smash" {{ in_array('Super Smash', old('games', [])) ? 'selected' : '' }}>Super Smash</option>
                        <option value="Counter Strike" {{ in_array('Counter Strike', old('games', [])) ? 'selected' : '' }}>Counter Strike</option>
                        <option value="Apex Legends" {{ in_array('Apex Legends', old('games', [])) ? 'selected' : '' }}>Apex Legends</option>
                        <option value="Minecraft" {{ in_array('Minecraft', old('games', [])) ? 'selected' : '' }}>Minecraft</option>
                        <option value="Roblox" {{ in_array('Roblox', old('games', [])) ? 'selected' : '' }}>Roblox</option>
                    </select>
                    <x-input-error :messages="$errors->get('games')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log("Document is ready. Initializing select2.");
            $('#games').select2({
                placeholder: "Select your games",
                allowClear: true,
            });
        });
    </script>

</x-layout>

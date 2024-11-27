<x-layout>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    @vite(['resources/js/app.js', 'resources/css/app.css'])

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

            <h1 class="font-bold text-3xl">Create Tournament</h1>

            <form class="space-y-4" action="{{ route('tournaments.store') }}" method="POST">
                @csrf

                <!-- Tournament Name -->
                <div>
                    <x-input-label for="name" :value="__('Tournament Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Tournament Description -->
                <div>
                    <x-input-label for="description" :value="__('Tournament Description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <!-- Tournament Rules -->
                <div>
                    <x-input-label for="rules" :value="__('Tournament Rules')" />
                    <x-text-input id="rules" class="block mt-1 w-full" type="text" name="rules" :value="old('rules')" required autofocus autocomplete="rules" />
                    <x-input-error :messages="$errors->get('rules')" class="mt-2" />
                </div>

                <!-- Style Dropdown -->
                <div>
                    <x-input-label for="style" :value="__('Tournament Style')" />
                    <select id="style" class="block mt-1 w-full select2" name="style" required>
                        <option value="">Select Style</option>
                        @foreach($styles as $key => $value)
                            <option value="{{ $key }}" {{ old('style') == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('style')" class="mt-2" />
                </div>

                <!-- Type Dropdown -->
                <div>
                    <x-input-label for="type" :value="__('Tournament Type')" />
                    <select id="type" class="block mt-1 w-full select2" name="type" required>
                        <option value="">Select Type</option>
                        @foreach($types as $key => $value)
                            <option value="{{ $key }}" {{ old('type') == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>

                <!-- Platforms Dropdown (Multiple) -->
                <div>
                    <x-input-label for="platforms" :value="__('Platforms')" />
                    <select id="platforms" class="block mt-1 w-full select2" name="platforms[]" multiple required>
                        @foreach($platforms as $key => $value)
                            <option value="{{ $key }}" {{ (collect(old('platforms'))->contains($key)) ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('platforms')" class="mt-2" />
                </div>

                <!-- Team Size -->
                <div>
                    <x-input-label for="team_size" :value="__('Team Size')" />
                    <x-text-input id="team_size" class="block mt-1 w-full" type="number" name="team_size" :value="old('team_size')" required />
                    <x-input-error :messages="$errors->get('team_size')" class="mt-2" />
                </div>

                <!-- Minimum Players -->
                <div>
                    <x-input-label for="min_players" :value="__('Minimum Players')" />
                    <x-text-input id="min_players" class="block mt-1 w-full" type="number" name="min_players" :value="old('min_players')" required />
                    <x-input-error :messages="$errors->get('min_players')" class="mt-2" />
                </div>

                <!-- Maximum Players -->
                <div>
                    <x-input-label for="max_players" :value="__('Maximum Players')" />
                    <x-text-input id="max_players" class="block mt-1 w-full" type="number" name="max_players" :value="old('max_players')" required />
                    <x-input-error :messages="$errors->get('max_players')" class="mt-2" />
                </div>

                <!-- Start Date -->
                <div>
                    <x-input-label for="start_date" :value="__('Start Date')" />
                    <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date')" required />
                    <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                </div>

                <!-- Start Time -->
                <div>
                    <x-input-label for="start_time" :value="__('Start Time')" />
                    <x-text-input id="start_time" class="block mt-1 w-full" type="time" name="start_time" :value="old('start_time')" required />
                    <x-input-error :messages="$errors->get('start_time')" class="mt-2" />
                </div>

                <!-- Timezone -->
                <div>
                    <x-input-label for="timezone" :value="__('Timezone')" />
                    <x-text-input id="timezone" class="block mt-1 w-full" type="text" name="timezone" :value="old('timezone')" required />
                    <x-input-error :messages="$errors->get('timezone')" class="mt-2" />
                </div>

                <!-- Prize -->
                <div>
                    <x-input-label for="prize" :value="__('Prize')" />
                    <x-text-input id="prize" class="block mt-1 w-full" type="text" name="prize" :value="old('prize')" required />
                    <x-input-error :messages="$errors->get('prize')" class="mt-2" />
                </div>

                <!-- Submit Button -->
                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Create Tournament
                    </button>
                </div>
            </form>

        </div>
    </div>

    <scripts>
        <script>
            $(document).ready(function() {
                $('.select2').select2({
                    placeholder: "Please select an option",
                    allowClear: true
                });
            });
        </script>
    </scripts>

</x-layout>

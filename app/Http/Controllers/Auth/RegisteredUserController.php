<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    // Blade Alpine User UI System Installed

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
//        $validatedData = $request->validate($this->validationRules());
//
//        $user = $this->createUser($validatedData);
//
//        $this->authenticateAndRedirect($user);
//
//        return redirect(route('dashboard', absolute: false));

        // Perform validation
        $validatedData = $request->validate($this->validationRules());

        // Log validated data to debug
        Log::info('Validated Data:', $validatedData);

        // Create user
        $user = $this->createUser($validatedData);

        // Check created user data
        Log::info('Created User:', $user->toArray());

        // Authenticate and redirect
        $this->authenticateAndRedirect($user);

        return redirect(route('dashboard', absolute: false));
    }

    private function validationRules(): array
    {
        return [
            'parent_first_name' => ['required', 'string', 'max:255'],
            'parent_last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'numeric'],
            'zip_code' => ['required', 'numeric'],
            'gamer_first_name' => ['required', 'string', 'max:255'],
            'gamer_birthday' => ['required', 'date'],
            'discord' => ['required', 'string', 'max:255'],
            'games' => ['required', 'array'],
            'games.*' => ['string'],
        ];
    }

    /**
     * Create a new user instance.
     */
    private function createUser(array $data): User
    {
        $user = User::create([
            'parent_first_name' => $data['parent_first_name'],
            'parent_last_name' => $data['parent_last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'zip_code' => $data['zip_code'],
            'gamer_first_name' => $data['gamer_first_name'],
            'gamer_birthday' => $data['gamer_birthday'],
            'discord' => $data['discord'],
            'games' => json_encode($data['games']),
        ]);

        if (!$user) {
            Log::error('User creation failed.', ['data' => $data]);
        }

        return $user;
    }

    /**
     * Authenticate the user and redirect them.
     */
    private function authenticateAndRedirect(User $user)
    {
        event(new Registered($user));
        Auth::login($user);
    }

}

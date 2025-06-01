<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Str;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';
    public string $neighborhood_association = '';
    public string $dasa_wisma = '';
    public string $coupon_number = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'neighborhood_association' => ['required', 'string', 'max:255'],
            'dasa_wisma' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['coupon_number'] = $this->generateUniqueCouponNumber();

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
    protected function generateUniqueCouponNumber(): string
    {
    do {
        $number = Str::padLeft(rand(0, 999), 3, '0');
    } while (User::where('coupon_number', $number)->exists());

    return $number;
    }
}

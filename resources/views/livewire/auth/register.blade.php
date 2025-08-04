<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $carrera = ''; // <-- AGREGADO
    public string $grupo = '';   // <-- AGREGADO
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'carrera' => ['required', 'string', 'max:255'], // <-- AGREGADO
            'grupo' => ['required', 'string', 'max:255'],   // <-- AGREGADO
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        // Con los campos en $fillable y la validación, User::create los tomará automáticamente.
        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirectIntended(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <flux:input
            wire:model="name"
            :label="__('Name')"
            type="text"
            required
            autofocus
            autocomplete="name"
            :placeholder="__('Full name')"
        />

        <flux:input
            wire:model="email"
            :label="__('Email address')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@example.com"
        />

        <div class="flex flex-col gap-1.5">
            <label for="carrera" class="text-sm font-medium text-zinc-950 dark:text-white">
                Carrera
            </label>
            <select wire:model="carrera" id="carrera" name="carrera" class="block w-full rounded-lg border-zinc-300 bg-white text-zinc-950 transition duration-150 ease-in-out focus:border-primary-500 focus:ring-primary-500 disabled:opacity-50 dark:border-zinc-700 dark:bg-zinc-900 dark:text-white dark:placeholder-zinc-400" required>
                <option value="" disabled>Selecciona tu carrera</option>
                <option value="Técnico Superior Universitario en Entornos Virtuales y Negocios Digitales">Técnico Superior Universitario en Entornos Virtuales y Negocios Digitales</option>
                <option value="Técnico Superior Universitario en Tecnologías de la Información Software">Técnico Superior Universitario en Tecnologías de la Información Software</option>
                <option value="Técnico Superior Universitario en Gastronomía">Técnico Superior Universitario en Gastronomía</option>
                <option value="Técnico Superior Universitario en Turismo, Área Hotelería">Técnico Superior Universitario en Turismo, Área Hotelería</option>
                <option value="Técnico Superior Universitario en Mantenimiento, Área Instalaciones">Técnico Superior Universitario en Mantenimiento, Área Instalaciones</option>
                <option value="Técnico Superior Universitario en Terapia Física">Técnico Superior Universitario en Terapia Física</option>
                <option value="Técnico Superior Universitario en Administración, Área Capital Humano">Técnico Superior Universitario en Administración, Área Capital Humano</option>
                </select>
            @error('carrera') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <flux:input
            wire:model="grupo"
            :label="__('Grupo')"
            type="text"
            required
            autocomplete="off"
            :placeholder="__('Ej: Ti43, GA40, Ti53, etc.')"
        />

        <flux:input
            wire:model="password"
            :label="__('Password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Password')"
            viewable
        />

        <flux:input
            wire:model="password_confirmation"
            :label="__('Confirm password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Confirm password')"
            viewable
        />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        <span>{{ __('Already have an account?') }}</span>
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div>
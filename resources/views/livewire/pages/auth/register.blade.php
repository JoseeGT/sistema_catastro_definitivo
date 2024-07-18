<?php
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public ?string $tipo_identificacion = null;
    public ?string $identificacion = null;
    public ?string $cod_telefono = null;
    public ?string $telefono = null;
    public ?int $direccion_id = null;
    public ?string $estado = null;

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'tipo_identificacion' => ['nullable', 'string'],
            'identificacion' => ['nullable', 'string'],
            'cod_telefono' => ['nullable', 'string'],
            'telefono' => ['nullable', 'string'],
            'estado' => ['nullable', 'in:ACTIVO,DESACTIVO'],
        ]);
        
        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
};
?>
<div>
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Tipo de Identificación -->
        <div class="mt-4">
            <x-input-label for="tipo_identificacion" :value="__('Tipo de Identificación')" />
            <select wire:model="tipo_identificacion" id="tipo_identificacion" class="block mt-1 w-full">
                <option value="">Seleccione una opción</option>
                <option value="V-">V-</option>
                <option value="E-">E-</option>
                <option value="J-">J-</option>
                <option value="P-">P-</option>
                <option value="G-">G-</option>
            </select>
            <x-input-error :messages="$errors->get('tipo_identificacion')" class="mt-2" />
        </div>

        <!-- Identificación -->
        <div class="mt-4">
            <x-input-label for="identificacion" :value="__('Identificación')" />
            <x-text-input wire:model="identificacion" id="identificacion" class="block mt-1 w-full" type="text" name="identificacion" />
            <x-input-error :messages="$errors->get('identificacion')" class="mt-2" />
        </div>

        <!-- Código de Teléfono -->
        <div class="mt-4">
            <x-input-label for="cod_telefono" :value="__('Código de Teléfono')" />
            <x-text-input wire:model="cod_telefono" id="cod_telefono" class="block mt-1 w-full" type="text" name="cod_telefono" />
            <x-input-error :messages="$errors->get('cod_telefono')" class="mt-2" />
        </div>

        <!-- Teléfono -->
        <div class="mt-4">
            <x-input-label for="telefono" :value="__('Teléfono')" />
            <x-text-input wire:model="telefono" id="telefono" class="block mt-1 w-full" type="text" name="telefono" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <!-- Dirección -->
        <div class="mt-4">
            <x-input-label for="direccion_id" :value="__('Dirección')" />
            <select wire:model="direccion_id" id="direccion_id" class="block mt-1 w-full">
                <!-- Aquí debes cargar las direcciones disponibles -->

            </select>
            <x-input-error :messages="$errors->get('direccion_id')" class="mt-2" />
        </div>

        <!-- Estado -->
        <div class="mt-4">
            <x-input-label for="estado" :value="__('Estado')" />
            <select wire:model="estado" id="estado" class="block mt-1 w-full">
                <option value="">Seleccione un estado</option>
                <option value="ACTIVO">ACTIVO</option>
                <option value="DESACTIVO">DESACTIVO</option>
            </select>
            <x-input-error :messages="$errors->get('estado')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>

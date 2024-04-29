<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="mt-4">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="form-label">Nombre</label>
            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="form-label">Contraseña</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <a class="text-sm text-decoration-none text-gray-600" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </form>

</x-guest-layout>

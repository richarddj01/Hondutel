<section>
    <header>
        <h2 class="text-lg font-medium text-dark">
            Actualizar Contraseña
        </h2>

        <p class="mt-1 text-sm text-muted">
            Asegúrate de que tu cuenta usane una contraseña larga para mayor seguridad
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">Contraseña Actual</label>
            <input type="password" id="update_password_current_password" name="current_password" class="form-control" autocomplete="current-password">
            @error('updatePassword.current_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">Nueva Contraseña</label>
            <input type="password" id="update_password_password" name="password" class="form-control" autocomplete="new-password">
            @error('updatePassword.password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input type="password" id="update_password_password_confirmation" name="password_confirmation" class="form-control" autocomplete="new-password">
            @error('updatePassword.password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-4">
            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-muted"
                >Guardado.</p>
            @endif
        </div>
    </form>
</section>

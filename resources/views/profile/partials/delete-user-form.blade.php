<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-dark">
            Eliminar Cuenta
        </h2>

        <p class="mt-1 text-sm text-muted">
            Cuando su cuenta es eliminada, todos sus daros serán permanentemente eliminados.
        </p>
    </header>

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        Eliminar Cuenta
    </button>

    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{ route('profile.destroy') }}" class="modal-content p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-dark">
                    ¿Estás seguro de eliminar tu cuenta?
                </h2>

                <p class="mt-1 text-sm text-muted">
                    Al eliminar tu cuenta, todos los datos serán permanentemente eliminados. Porfavor ingresa tu contraseña para confirmar que realmente deseas eliminar tu cuenta.
                </p>

                <div class="mt-6">
                    <label for="password" class="visually-hidden">Contraseña</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    @error('userDeletion.password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-6 d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="submit" class="btn btn-danger">
                        Eliminar Cuenta
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-semibold text-center my-3">
            Perfil de Usuario
        </h2>
    </x-slot>

    <div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-4 bg-white shadow-sm rounded-lg">
                <div class="p-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-4 bg-white shadow-sm rounded-lg">
                <div class="p-4">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-4 bg-white shadow-sm rounded-lg">
                <div class="p-4">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>

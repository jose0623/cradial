<?php

namespace App\Providers;

// No necesitas importar Post o PostPolicy aquí si no los usas
use App\Models\User; // Asegúrate de importar el modelo User
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Deja este array vacío o coméntalo si no tienes ninguna Policy de modelo
        // Si en el futuro creas un modelo y su policy, la agregarías aquí.
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Define tus Gates aquí
        // Gate para Administrador
        Gate::define('access-admin-section', function (User $user) {
            return $user->role === 'admin';
        });

        // Gate para Editor/Manager
        Gate::define('access-editor-section', function (User $user) {
            // Un administrador también puede acceder a las secciones de editor
            return in_array($user->role, ['admin', 'editor']);
        });

        // Gate para Usuario Regular (ejemplo, quizás para acceder a su perfil)
        Gate::define('access-user-section', function (User $user) {
            // Todos los usuarios autenticados, incluyendo admin y editor, pueden acceder
            return in_array($user->role, ['admin', 'editor', 'user']);
        });

        // Puedes definir Gates más específicos si necesitas, por ejemplo:
        // Gate::define('create-reports', function (User $user) {
        //     return in_array($user->role, ['admin', 'editor']);
        // });
        // Gate::define('view-sensitive-data', function (User $user) {
        //     return $user->role === 'admin';
        // });
    }
}
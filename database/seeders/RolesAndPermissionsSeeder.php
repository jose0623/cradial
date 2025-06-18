<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User; // Importa tu modelo User

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Resetear permisos cacheados para evitar problemas
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Crear Permisos
        // Permisos de usuario/roles
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        // Permisos para Emisoras y sus relacionados
        Permission::create(['name' => 'view emisoras']);
        Permission::create(['name' => 'create emisoras']);
        Permission::create(['name' => 'edit emisoras']);
        Permission::create(['name' => 'delete emisoras']);

        // Permisos para Tipos de Emisoras, Programas, etc. (ejemplos)
        Permission::create(['name' => 'manage types']); // Para TipoEmisora, TipoPrograma, TipoAfiliacion
        Permission::create(['name' => 'manage regions']); // Para Paises, Estados, Municipios

        // Permisos para Clientes
        Permission::create(['name' => 'view clientes']);
        Permission::create(['name' => 'create clientes']);
        Permission::create(['name' => 'edit clientes']);
        Permission::create(['name' => 'delete clientes']);
        Permission::create(['name' => 'manage tipo clientes']);

        // Permisos para Reportes
        Permission::create(['name' => 'view reportes']);
        Permission::create(['name' => 'generate reportes']);
        Permission::create(['name' => 'manage reporte items']);

        // Permisos para Fiestas
        Permission::create(['name' => 'view fiestas']);
        Permission::create(['name' => 'create fiestas']);
        Permission::create(['name' => 'edit fiestas']);
        Permission::create(['name' => 'delete fiestas']);


        // 2. Crear Roles y Asignar Permisos

        // Rol: Administrador (acceso completo)
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo(Permission::all()); // El admin tiene todos los permisos

        // Rol: Editor de Contenido (puede ver y editar emisoras, programas, etc.)
        $roleEditor = Role::create(['name' => 'editor']);
        $roleEditor->givePermissionTo([
            'view emisoras', 'create emisoras', 'edit emisoras',
            'view clientes', 'create clientes', 'edit clientes',
            'view reportes',
            'view fiestas', 'create fiestas', 'edit fiestas',
            'manage types', 'manage regions'
        ]);

        // Rol: Visor (solo puede ver emisoras, clientes, reportes)
        $roleViewer = Role::create(['name' => 'viewer']);
        $roleViewer->givePermissionTo([
            'view emisoras',
            'view clientes',
            'view reportes',
            'view fiestas'
        ]);

        // Rol: Usuario Básico (ej. solo acceso a su propio dashboard)
        $roleUser = Role::create(['name' => 'user']);
        // A este rol no le asignamos permisos específicos en este ejemplo,
        // ya que su acceso estará más controlado por Jetstream por defecto
        // o por políticas de autorización.

        // 3. Asignar un rol a un usuario existente
        // Busca el primer usuario, asumiendo que es tu cuenta de administrador
        $user = User::find(2); 
        // Si no estás seguro de que el ID 1 es el tuyo, puedes buscar por email:
        // $user = User::where('email', 'tu_email@ejemplo.com')->first();

        if ($user) {
            $user->assignRole('admin'); // Asigna el rol de administrador
            $this->command->info("Rol 'admin' asignado al usuario con ID: {$user->id}");
        } else {
            $this->command->warn("No se encontró el usuario con ID 1. No se asignó ningún rol.");
        }
    }
}
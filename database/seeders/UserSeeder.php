<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role; // Importa el modelo Role de Spatie

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Asegúrate de que los roles existan (opcional, pero buena práctica si no los creas en otro seeder)
        // Solo si los roles 'admin', 'editor', 'viewer' no se crean en DatabaseSeeder o en otro lugar
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin']);
        }
        if (!Role::where('name', 'editor')->exists()) {
            Role::create(['name' => 'editor']);
        }
        if (!Role::where('name', 'viewer')->exists()) {
            Role::create(['name' => 'viewer']);
        }

        // 2. Crea el usuario administrador
        // Si el usuario ya existe, no lo crees de nuevo para evitar duplicados
        $adminUser = User::firstOrCreate(
            [
                'email' => 'josebrito0623@gmail.com', // Correo único para el usuario admin
            ],
            [
                'name' => 'Administrador CRadial',
                'password' => Hash::make('brito0623'), // Contraseña por defecto 'password'
                'email_verified_at' => now(), // Marca el email como verificado
            ]
        );

        // 3. Asigna el rol 'admin' al usuario
        // Asegúrate de que el usuario tenga el rol 'admin'
        if (!$adminUser->hasRole('admin')) {
            $adminUser->assignRole('admin');
        }

        $this->command->info('Usuario Administrador "josebrito0623@gmail.com" creado/actualizado y con rol "admin".');

        // Puedes añadir más usuarios aquí si lo necesitas
        $editorUser = User::firstOrCreate(
            [
                'email' => 'editor@cradial.com',
            ],
            [
                'name' => 'Editor CRadial',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        if (!$editorUser->hasRole('editor')) {
            $editorUser->assignRole('editor');
        }
        $this->command->info('Usuario Editor "editor@cradial.com" creado/actualizado y con rol "editor".');


        $viewerUser = User::firstOrCreate(
            [
                'email' => 'viewer@cradial.com',
            ],
            [
                'name' => 'Viewer CRadial',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        if (!$viewerUser->hasRole('viewer')) {
            $viewerUser->assignRole('viewer');
        }
        $this->command->info('Usuario Viewer "viewer@cradial.com" creado/actualizado y con rol "viewer".');
    }
}
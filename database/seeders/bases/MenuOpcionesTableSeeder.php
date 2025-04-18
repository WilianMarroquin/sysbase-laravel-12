<?php

namespace Database\Seeders\bases;

use App\Models\MenuOpcion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuOpcionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        MenuOpcion::truncate();

        MenuOpcion::create([
            "titulo" => "Inicio",
            "icono" => "ri-home-8-line",
            "ruta" => "index",
            "orden" => 0,
            "action" => "Listar Inicio",
            "subject" => "Inicio",
            "parent_id" => null
        ]);
        MenuOpcion::create([
            "titulo" => null,
            "icono" => null,
            "ruta" => null,
            "orden" => 1,
            "titulo_seccion" => "Administración",
            "action" => "Ver modulo configuracion",
            "subject" => "Configuracion",
            "parent_id" => null
        ]);
        MenuOpcion::create([
            "titulo" => "Modulo Usuarios",
            "icono" => "ri-group-line",
            "ruta" => "second-page",
            "orden" => 2,
            "action" => "Ver modulo usuarios",
            "subject" => "User",
            "parent_id" => null
        ]);
        MenuOpcion::create([
            "titulo" => "Usuarios",
            "icono" => "ri-list-ordered-2",
            "ruta" => "admin-modulo-usuarios-usuarios",
            "orden" => 3,
            "action" => "Listar usuarios",
            "subject" => "User",
            "parent_id" => 3
        ]);
        MenuOpcion::create([
            "titulo" => "Roles",
            "icono" => "ri-folder-shield-2-line",
            "ruta" => "admin-modulo-usuarios-roles",
            "orden" => 4,
            "action" => "Listar roles",
            "subject" => "Rol",
            "parent_id" => 3
        ]);
        MenuOpcion::create([
            "titulo" => "Permisos",
            "icono" => "ri-file-shield-2-fill",
            "ruta" => "admin-modulo-usuarios-permisos",
            "orden" => 5,
            "action" => "Listar permisos",
            "subject" => "Permission",
            "parent_id" => 3
        ]);
        MenuOpcion::create([
            "titulo" => "Configuraciones",
            "icono" => "ri-folder-settings-fill",
            "ruta" => null,
            "orden" => 6,
            "action" => "Ver modulo configuracion",
            "subject" => "Configuracion",
            "parent_id" => null
        ]);
        MenuOpcion::create([
            "titulo" => "Opciones Menu",
            "icono" => "ri-apps-2-add-line",
            "ruta" => "admin-configuraciones-menu",
            "orden" => 7,
            "action" => "Listar Menu Opciones",
            "subject" => "Menu Opcion",
            "parent_id" => 7
        ]);
        MenuOpcion::create([
            "titulo" => "Generales",
            "icono" => "ri-settings-3-fill",
            "ruta" => "admin-configuraciones-generales",
            "orden" => 8,
            "action" => "Listar configuraciones generales",
        "subject" => "Configuracion",
            "parent_id" => 7
        ]);
        MenuOpcion::create([
            "titulo" => null,
            "icono" => null,
            "ruta" => null,
            "orden" => 9,
            "titulo_seccion" => "Modulo Programación",
            "action" => "Ver Modulo Desarrollo",
            "subject" => "Desarrollo",
            "parent_id" => null
        ]);
        MenuOpcion::create([
            "titulo" => "Developers",
            "icono" => "ri-tools-fill",
            "ruta" => "second-page",
            "orden" => 10,
            "action" => "Ver Modulo Desarrollo",
            "subject" => "Desarrollo",
            "parent_id" => null
        ]);
        MenuOpcion::create([
            "titulo" => "Configuraciones",
            "icono" => "ri-settings-5-fill",
            "ruta" => "dev-configuraciones",
            "orden" => 11,
            "action" => "Listar Configuraciones",
            "subject" => "Configuracion",
            "parent_id" => 11
        ]);
        MenuOpcion::create([
            "titulo" => "Componentes",
            "icono" => "ri-code-box-line",
            "ruta" => "dev-componentes",
            "orden" => 12,
            "action" => "Listar Componentes",
            "subject" => "Desarrollo",
            "parent_id" => 11
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /*Roles*/
        DB::transaction(function () {
            Role::create(['name' => 'Gerente']);
            Role::create(['name' => 'Tecnico']);
            Role::create(['name' => 'Atencion_al_Cliente']);
            Role::create(['name' => 'Auditor']);
            Role::create(['name' => 'Super Admin']);
        });

        /*Usuario Desarrollador*/
        $devUser = new User();
        $devUser->name = 'Dev';
        $devUser->email = 'devhondutel@gmail.com';
        $devUser->password = bcrypt('h@ndutel0401');
        $devUser->save();

        $devUser->assignRole('Super Admin');


        /*Permisos*/
        DB::transaction(function () {
            //acesos modulos 
            Permission::create(['name' => 'Modulo Clientes']);
            Permission::create(['name' => 'Modulo Zonas']);
            Permission::create(['name' => 'Modulo Servicios']);
            Permission::create(['name' => 'Modulo Datos Tecnicos']);
            Permission::create(['name' => 'Modulo Averias']);
            Permission::create(['name' => 'Modulo Telefonos']);
            Permission::create(['name' => 'Modulo Inventario']);
            Permission::create(['name' => 'Modulo Administracion']);

            //Permisos Clientes
            Permission::create(['name' => 'Listar Clientes']);
            Permission::create(['name' => 'Editar Clientes']);
            Permission::create(['name' => 'Upd Clientes']);
            Permission::create(['name' => 'Del Clientes']);
            Permission::create(['name' => 'Crear Clientes']);

            //Permisos modulo Zonas
            Permission::create(['name' => 'Listar Zonas']);
            Permission::create(['name' => 'Editar Zonas']);
            Permission::create(['name' => 'Upd Zonas']);
            Permission::create(['name' => 'Del Zonas']);
            Permission::create(['name' => 'Crear Zonas']);

            //Permisos modulo Servicios
            Permission::create(['name' => 'Listar Servicios']);
            Permission::create(['name' => 'Editar Servicios']);
            Permission::create(['name' => 'Upd Servicios']);
            Permission::create(['name' => 'Del Servicios']);
            Permission::create(['name' => 'Crear Servicios']);

            //Permisos modulo Datos Tecnicos
            Permission::create(['name' => 'Listar Datos Tecnicos']);
            Permission::create(['name' => 'Editar Datos Tecnicos']);
            Permission::create(['name' => 'Upd Datos Tecnicos']);
            Permission::create(['name' => 'Del Datos Tecnicos']);
            Permission::create(['name' => 'Crear Datos Tecnicos']);

            //Permisos modulo Averias
            Permission::create(['name' => 'Listar Averias']);
            Permission::create(['name' => 'Editar Averias']);
            Permission::create(['name' => 'Upd Averias']);
            Permission::create(['name' => 'Del Averias']);
            Permission::create(['name' => 'Crear Averias']);

            //Permisos modulo Telefonos
            Permission::create(['name' => 'Listar Telefonos']);
            Permission::create(['name' => 'Editar Telefonos']);
            Permission::create(['name' => 'Upd Telefonos']);
            Permission::create(['name' => 'Del Telefonos']);
            Permission::create(['name' => 'Crear Telefonos']);

            //Permisos modulo Inventario    
            Permission::create(['name' => 'Listar Inventario']);
            Permission::create(['name' => 'Editar Inventario']);
            Permission::create(['name' => 'Upd Inventario']);
            Permission::create(['name' => 'Del Inventario']);
            Permission::create(['name' => 'Crear Inventario']);

            //Permisos modulo Usuarios
            Permission::create(['name' => 'Listar Usuarios']);
            Permission::create(['name' => 'Editar Usuarios']);
            Permission::create(['name' => 'Upd Usuarios']);
            Permission::create(['name' => 'Del Usuarios']);
            Permission::create(['name' => 'Crear Usuarios']);

            //Permisos modulo Roles
            Permission::create(['name' => 'Listar Roles']);
            Permission::create(['name' => 'Editar Roles']);
            Permission::create(['name' => 'Upd Roles']);
            Permission::create(['name' => 'Del Roles']);
            Permission::create(['name' => 'Crear Roles']);

            //Permisos modulo Permisos
            Permission::create(['name' => 'Listar Permisos']);
            Permission::create(['name' => 'Editar Permisos']);
            Permission::create(['name' => 'Upd Permisos']);
            Permission::create(['name' => 'Del Permisos']);
            Permission::create(['name' => 'Crear Permisos']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};

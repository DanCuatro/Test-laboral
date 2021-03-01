<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;	

class PermissionsTableSeeder extends Seeder{

    public function run(){
    	//Usuario
        Permission::create([
        	'name' => 'Navegar Empleados',
        	'slug' => 'users.index',
        	'description' => 'Lista de navegación de Empleados',
        ]);
        Permission::create([
        	'name' => 'Ver detalles de Empleados',
        	'slug' => 'users.show',
        	'description' => 'Permite ver los datos personales de los Empleados',
        ]);
        Permission::create([
        	'name' => 'Editar Empleado',
        	'slug' => 'users.edit',
        	'description' => 'Permite modificar los datos personales de los Empleados',
		]);
		Permission::create([
        	'name' => 'Complemento de Datos',
        	'slug' => 'users.editCom',
        	'description' => 'Permite complementar los Datos Faltantes de un Empleado, estos datos solo pueden ser dados por la escuela',
		]);
		Permission::create([
        	'name' => 'Rolos de Empleados',
        	'slug' => 'users.editRol',
        	'description' => 'Permite Asignar uno o más rolos a los Empleados',
		]);
        Permission::create([
        	'name' => 'Baja/Alta de Empleados',
        	'slug' => 'users.destroy',
        	'description' => 'Permite dar de Baja o Alta a los Empleados',
        ]);

        //Roles
        Permission::create([
        	'name' => 'Navegar Roles',
        	'slug' => 'roles.index',
        	'description' => 'Lista de navegación de Roles',
        ]);
        Permission::create([
        	'name' => 'Detalles de Roles',
        	'slug' => 'roles.show',
        	'description' => 'Permite ver los detalles de los Roles',
        ]);
        Permission::create([
        	'name' => 'Crear Roles',
        	'slug' => 'roles.create',
        	'description' => 'Permite crear Roles',
        ]);
        Permission::create([
        	'name' => 'Editar Roles',
        	'slug' => 'roles.edit',
        	'description' => 'Permite modificar los Roles',
        ]);
        Permission::create([
        	'name' => 'Eliminar Roles',
        	'slug' => 'roles.destroy',
        	'description' => 'Permite eliminar Roles',
        ]);

		//Area
		Permission::create([
        	'name' => 'Navegar Áreas',
        	'slug' => 'areas.index',
        	'description' => 'Lista de navegación de Áreas',
        ]);
        Permission::create([
        	'name' => 'Detalles de Áreas',
        	'slug' => 'areas.show',
        	'description' => 'Permite ver los detalles de las Áreas',
        ]);
        Permission::create([
        	'name' => 'Crear Áreas',
        	'slug' => 'areas.create',
        	'description' => 'Permite crear Áreas',
        ]);
        Permission::create([
        	'name' => 'Editar Áreas',
        	'slug' => 'areas.edit',
        	'description' => 'Permite modificar las Áreas',
        ]);
        Permission::create([
        	'name' => 'Baja/Alta de Áreas',
        	'slug' => 'areas.destroy',
        	'description' => 'Permite dar de Baja o Alta Áreas',
		]);
		
		//Correo
        Permission::create([
        	'name' => 'Navegar Correo',
        	'slug' => 'correos.index',
        	'description' => 'Lista de navegación de Correo',
        ]);
        Permission::create([
        	'name' => 'Detalles de Correo',
        	'slug' => 'correos.show',
        	'description' => 'Permite ver los detalles de los Correo',
        ]);
        Permission::create([
        	'name' => 'Crear Correo',
        	'slug' => 'correos.create',
        	'description' => 'Permite crear Correo',
        ]);
        Permission::create([
        	'name' => 'Editar Correo',
        	'slug' => 'correos.edit',
        	'description' => 'Permite modificar los Correo',
        ]);
        Permission::create([
        	'name' => 'Baja/Alta de Correo',
        	'slug' => 'correos.destroy',
        	'description' => 'Permite dar de Baja o Alta Correo',
		]);

		//Campus
        Permission::create([
        	'name' => 'Navegar Campus',
        	'slug' => 'campus.index',
        	'description' => 'Lista de navegación de Campus',
        ]);
        Permission::create([
        	'name' => 'Detalles de Campus',
        	'slug' => 'campus.show',
        	'description' => 'Permite ver los detalles de los Campus',
        ]);
        Permission::create([
        	'name' => 'Crear Campus',
        	'slug' => 'campus.create',
        	'description' => 'Permite crear Campus',
        ]);
        Permission::create([
        	'name' => 'Editar Campus',
        	'slug' => 'campus.edit',
        	'description' => 'Permite modificar los Campus',
        ]);
        Permission::create([
        	'name' => 'Baja/Alta de Campus',
        	'slug' => 'campus.destroy',
        	'description' => 'Permite dar de Baja o Alta Campus',
		]);

		//Cuestionario
		Permission::create([
        	'name' => 'Asignar Cuestionario',
        	'slug' => 'cuestionario.asing',
        	'description' => 'Permite Asignar o modificar Fechas de realización de cuestionario',
		]);
		
		//Graficos
        Permission::create([
        	'name' => 'Navegar Graficos',
        	'slug' => 'graficos.index',
        	'description' => 'Permite visualizar los datos estadísticos de Todas las Áreas',
		]);
    }
}

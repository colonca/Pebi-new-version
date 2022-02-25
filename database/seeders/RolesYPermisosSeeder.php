<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesYPermisosSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//roles
		$admin = Role::create(['name' => 'admin']);
		$secretaria = Role::create(['name' => 'secretaria']);
		$profesional = Role::create(['name' => 'tallerista-profesional']);
		$practicante = Role::create(['name' => 'tallerista-practicante']);
        $docente = Role::create(['name'=>'docente-permanencia']);

		//intervenciones grupales
		Permission::create(['name' => 'intervenciones-grupales.index'])->syncRoles([$admin, $profesional, $practicante]);
		Permission::create(['name' => 'intervenciones-grupales.create'])->syncRoles([$admin, $profesional, $practicante]);
		Permission::create(['name' => 'intervenciones-grupales.update'])->syncRoles([$admin, $profesional, $practicante]);
		Permission::create(['name' => 'intervenciones-grupales.delete'])->syncRoles([$admin, $profesional, $practicante]);

        //intervenciones individuales
        Permission::create(['name' => 'intervenciones-individuales.index'])->syncRoles([$admin, $profesional]);
        Permission::create(['name' => 'intervenciones-individuales.create'])->syncRoles([$admin, $profesional]);
        Permission::create(['name' => 'intervenciones-individuales.update'])->syncRoles([$admin, $profesional]);
        Permission::create(['name' => 'intervenciones-individuales.delete'])->syncRoles([$admin, $profesional]);

        //talleristas
		Permission::create(['name' => 'talleristas.index'])->syncRoles([$admin, $secretaria]);
		Permission::create(['name' => 'talleristas.create'])->syncRoles([$admin, $secretaria]);
		Permission::create(['name' => 'talleristas.update'])->syncRoles([$admin, $secretaria]);
		Permission::create(['name' => 'talleristas.delete'])->syncRoles([$admin, $secretaria]);

		//docentes permanencia
		Permission::create(['name' => 'docentes-permanencia.index'])->syncRoles([$admin, $secretaria]);
		Permission::create(['name' => 'docentes-permanencia.create'])->syncRoles([$admin, $secretaria]);
		Permission::create(['name' => 'docentes-permanencia.update'])->syncRoles([$admin, $secretaria]);
		Permission::create(['name' => 'docentes-permanencia.delete'])->syncRoles([$admin, $secretaria]);

		//lineas
		Permission::create(['name' => 'lineas.index'])->syncRoles([$admin, $secretaria]);
		Permission::create(['name' => 'lineas.create'])->syncRoles([$admin, $secretaria]);
		Permission::create(['name' => 'lineas.update'])->syncRoles([$admin, $secretaria]);
		Permission::create(['name' => 'lineas.delete'])->syncRoles([$admin, $secretaria]);

		//campañas
		Permission::create(['name' => 'campanhas.index'])->syncRoles([$admin, $secretaria]);
		Permission::create(['name' => 'campanhas.create'])->syncRoles([$admin, $secretaria]);
		Permission::create(['name' => 'campanhas.update'])->syncRoles([$admin, $secretaria]);
		Permission::create(['name' => 'campanhas.delete'])->syncRoles([$admin, $secretaria]);

		//talleres
		Permission::create(['name' => 'talleres.index'])->syncRoles([$admin, $secretaria]);
		Permission::create(['name' => 'talleres.create'])->syncRoles([$admin, $secretaria]);
		Permission::create(['name' => 'talleres.update'])->syncRoles([$admin, $secretaria]);
		Permission::create(['name' => 'talleres.delete'])->syncRoles([$admin, $secretaria]);

		//estudiantes
		Permission::create(['name' => 'estudiantes.index'])->syncRoles([$admin, $secretaria]);
		Permission::create(['name' => 'estudiantes.create'])->syncRoles([$admin, $secretaria]);
		Permission::create(['name' => 'estudiantes.update'])->syncRoles([$admin, $secretaria]);

        //periodos academicos
        Permission::create(['name' => 'periodos.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'periodos.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'periodos.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'periodos.delete'])->syncRoles([$admin, $secretaria]);

        //Reportes
        Permission::create(['name' => 'reportes.lineas'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'reportes.riesgos'])->syncRoles([$admin, $secretaria]);

        //usuarios
		Permission::create(['name' => 'usuarios.index'])->syncRoles([$admin, $secretaria]);
	}
}

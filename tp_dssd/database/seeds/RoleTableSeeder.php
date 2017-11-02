<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_employee = new Role();
      $role_employee->name = 'admin';
      $role_employee->description = 'Un usuario administrador';
      $role_employee->save();

      $role_employee = new Role();
      $role_employee->name = 'empleado';
      $role_employee->description = 'Un usuario empleado';
      $role_employee->save();

      $role_manager = new Role();
      $role_manager->name = 'cliente';
      $role_manager->description = 'Un usuario cliente';
      $role_manager->save();

      $role_manager = new Role();
      $role_manager->name = 'user';
      $role_manager->description = 'Un usuario comun';
      $role_manager->save();
    }
}

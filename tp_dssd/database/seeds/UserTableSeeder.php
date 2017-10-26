<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_employee = App\Role::where('name', 'empleado')->first();
      $role_manager  = App\Role::where('name', 'cliente')->first();

      $employee = new User();
      $employee->name = 'Employee Name';
      $employee->email = 'employee@example.com';
      $employee->password = bcrypt('secret');
      $employee->save();
      $employee->roles()->attach($role_employee);

      $manager = new User();
      $manager->name = 'Client Name';
      $manager->email = 'manager@example.com';
      $manager->password = bcrypt('secret');
      $manager->save();
      $manager->roles()->attach($role_manager);
    }
}

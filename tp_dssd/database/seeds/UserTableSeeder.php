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
      $role_admin = App\Role::where('name', 'admin')->first();
      $role_employee = App\Role::where('name', 'empleado')->first();
      $role_client  = App\Role::where('name', 'cliente')->first();
      $role_user  = App\Role::where('name', 'user')->first();

      $admin = new User();
      $admin->name = 'Admin';
      $admin->email = 'admin@admin.com';
      $admin->password = bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);

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
      $manager->roles()->attach($role_client);

      $user = new User();
      $user->name = 'user Name';
      $user->email = 'user@user.com';
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_user);
    }
}

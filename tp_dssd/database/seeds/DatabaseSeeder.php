<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\User::class, 10)->create();
      // Role comes before User seeder here.
      $this->call(RoleTableSeeder::class);
      // User seeder will use the roles above created.
      $this->call(UserTableSeeder::class);

      $this->call(ClientTableSeeder::class);
      $this->call(IncidenciaTableSeeder::class);
      $this->call(ProveedorSeeder::class);
      $this->call(ObjetoSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(astromap\User::class, 50)->create();
      factory(astromap\User::class, 1)->states('dev@astromap')->create();
    }
}

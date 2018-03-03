<?php

use Illuminate\Database\Seeder;
use App\User;

class AssignRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        $user->assignRole('Administrador');

        $user = User::find(2);
        $user->assignRole('Usuario');

        $user = User::find(3);
        $user->assignRole('Supervisor');
    }
}

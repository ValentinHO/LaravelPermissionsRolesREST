<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name'=>'Valentin','email'=>'valentin@gmail.com','password'=>bcrypt('123456')]);

        factory(User::class,2)->create();
    }
}

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
        $this->truncateTables(['role_has_permissions','model_has_permissions','model_has_roles','permissions','roles','users','posts','sites']);
        $this->call(RolesAnPermissionSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(AssignRolSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(SitiosSeeder::class);
    }

    protected function truncateTables(array $tables){
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

    	foreach ($tables as $table) {
    		DB::table($table)->truncate();
    	}

    	DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}

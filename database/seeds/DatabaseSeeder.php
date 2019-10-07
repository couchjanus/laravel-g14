<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public function run()
    {
        // \DB::table('users')->truncate();
        // \DB::table('categories')->truncate();
        // \DB::table('posts')->truncate();
        // \DB::table('permissions')->truncate();
        // \DB::table('roles')->truncate();
        
        $this->call([
            // UsersTableSeeder::class,
            // CategoriesSeeder::class,
            // PostsTableSeeder::class,
            PermissionsSeeder::class,
            RolesSeeder::class
        ]);
    }
}

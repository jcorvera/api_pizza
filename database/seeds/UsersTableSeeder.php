<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 8)->create();

        DB::table('users')->insert([
            'name' => 'cliente',
            'email' => 'cliente@gmail.com',
            'password' => bcrypt('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'user_type' => 1,
            'password' => bcrypt('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

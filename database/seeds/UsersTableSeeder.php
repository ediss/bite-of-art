<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'          => 'Galerista',
                'email'         => 'galerista@gmail.com',
                'password'      => bcrypt('12345678'),
                'role_id'       => 2,
                'city_country'  => 'Beograd',
                'approved'      => 1

            ],
            
            [
                'name'          => 'moderator',
                'email'         => 'moderator@gmail.com',
                'password'      => bcrypt('12345678'),
                'role_id'       => 1,
                'city_country'  => 'Beograd',
                'approved'      => 1
            ]
        ]);
    }
}

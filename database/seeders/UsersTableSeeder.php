<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        User::truncate();

        $faker = \Faker\Factory::create();

        User::create([
            'name' => 'Adminstrator',
            'email' => 'admin@admin.com',
            'password' =>bcrypt("password"),
            'email_verified_at'=>now(),
            'remember_token' => Str::random(10),
        ]);
    }
}

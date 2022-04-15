<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);


        DB::table('companies')->delete();
        Db::table('employees')->delete();
        
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 15; $i++){
            Company::create([
                'name'=> $faker->company.' '.$faker->companySuffix,
                'email'=>$faker->companyEmail,
            ]);
        }

        $companies = DB::table('companies')
                        ->select('id')->get()->toArray();

        $ids = array_map(function($v){
            return $v->id;
        },$companies);
        
        for($i = 0; $i < 200; $i++){    
            Employee::create([
                'first_name'=> $faker->firstName,
                'last_name'=>$faker->lastName,
                'email'=>$faker->email,
                'comp_id'=>$faker->randomElement($ids)
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $arrayTypeUser = [0,1];

        DB::table('users')->insert([
            'name'      => $faker->name,
            'lastname'  => $faker->lastName,
            'email'     => 'test-workmotion@gmail.com',
            'password'  => bcrypt('test-workmotion@gmail.com'),
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);

       //  for ($i=0; $i < 6; $i++) {
       //    DB::table('users')->insert([
       //      'name'      => $faker->name,
       //      'lastname'  => $faker->lastName,
       //      'email'     => str_random(10).'@gmail.com',
       //      'typeUser'  => 1,
       //      'password'  => bcrypt('secret'),
       //      'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
       //      'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
       //    ]);
       // }
       //  for ($i=0; $i < 10; $i++) {
       //    DB::table('users')->insert([
       //      'name'      => $faker->name,
       //      'lastname'  => $faker->lastName,
       //      'email'     => str_random(10).'@gmail.com',
       //      'typeUser'  => 0,
       //      'password'  => bcrypt('secret'),
       //      'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
       //      'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
       //    ]);
       // }
    }
}

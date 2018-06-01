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
        // $this->call(UsersTableSeeder::class);
        $faker = Faker\Factory::create(); //import library faker

        $limit = 5; //batasan berapa banyak data

        for ($i = 0; $i < $limit; $i++) {
            DB::table('comments')->insert([ //mengisi datadi database
                'id' => $faker->unique()->id,
                'nama' => $faker->name,
                'comment' => $faker->comment,
                'created_at' => $faker->date_add(),
                'update_at' => $faker->date_modify(),
            ]);
        }
    }
}

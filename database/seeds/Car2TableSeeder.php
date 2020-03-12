<?php

use Illuminate\Database\Seeder;

class Car2TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\User::where('name','admin')->first();
        factory(\App\Car2::class,4)->create(['user_id' => $admin->id]);


        factory(\App\Car2::class,6)->create();
    }
}

<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        $admin = factory(User::class)->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);

        \DB::table('role_user')->insertOrIgnore([
            [
                'user_id' => $admin->id,
                'role_id' => \App\Role::where('name','moderator')->first()->id,
            ],
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class AbilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('abilities')->insertOrIgnore([
            ['name' => 'edit_forum'],
        ]);

        \DB::table('ability_role')->insertOrIgnore([
            [
                'role_id' => \App\Role::where('name','moderator')->first()->id,
                'ability_id' => \App\Ability::where('name','edit_forum')->first()->id,
            ],
        ]);
    }
}

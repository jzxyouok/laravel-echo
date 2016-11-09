<?php

use Illuminate\Database\Seeder;

class users_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 10)->create();

        factory(\App\User::class)->create([
            'name' => 'Pedro',
            'email' => 'plazari96@gmail.com',
            'password' => bcrypt('pedro')
        ]);

        factory(\App\User::class)->create([
            'name' => 'Murilo',
            'email' => 'murilo@gmail.com',
            'password' => bcrypt('murilo')
        ]);
    }
}

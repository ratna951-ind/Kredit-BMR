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
        App\User::insert([
            [
                'nama' => 'Administrator',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'kode_kios' => 712002,
                'peran_id' => 1
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'mohamad salman farizi',
            'email' => 'salman@test.com',
            'contact' => '085722240256',
            'address' => 'Kp. babaka 001/004 jambenenggang kab. sukabumi',
            'role' => 'admin',
            'password' => Hash::make('salman'),
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'phone' => '081234567890',
            'religion' => 'Islam',
            'gender' => 'male',
            'citizenship' => 'Indonesia',
            'address' => 'Jl. Test',
            'blood_group' => 'A',
            'married_status' => 'single',
            'job' => 'Programmer',
            'last_education' => 'S1',
            'place_of_birth' => 'Jakarta',
            'date_of_birth' => '1990-01-01',
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'phone' => '081234567890',
            'religion' => 'Islam',
            'gender' => 'male',
            'citizenship' => 'Indonesia',
            'address' => 'Jl. Test',
            'blood_group' => 'A',
            'married_status' => 'single',
            'job' => 'Programmer',
            'last_education' => 'S1',
            'place_of_birth' => 'Jakarta',
            'date_of_birth' => '1990-01-01',
        ]);

        $user->assignRole('user');
    }
}

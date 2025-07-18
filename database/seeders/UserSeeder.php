<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@raf.rs',
            'password' => Hash::make('admin.123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Pera Peric',
            'email' => 'pera@raf.rs',
            'password' => Hash::make('customer.123'),
            'role' => 'customer',
        ]);

         User::create([
            'name' => 'Mika Mikic',
            'email' => 'mika@raf.rs',
            'password' => Hash::make('customer.123'),
            'role' => 'customer',
        ]);

         User::create([
            'name' => 'Jova Jovic',
            'email' => 'jova@raf.rs',
            'password' => Hash::make('customer.123'),
            'role' => 'customer',
        ]);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'admin',
            'email' => 'sadamtugas@gmail.com',
            'mata-pelajaran' => NULL,
            'otp' => NULL,
            'waktu_otp' => NULL,
            'tanggal_otp' => NULL,
            'pangkat' => NULL,
            'level' => 'admin',
            'password' => Hash::make('sadam12345')
        ]);
    }
}

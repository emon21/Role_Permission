<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{

    protected static ?string $password;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => 'admin@mail.com', //password
            // 'password' => static::$password ??= Hash::make('password'), //password
            'remember_token' => Str::random(10),
        ]);

        $user->assignRole('admin','user');
    }
}

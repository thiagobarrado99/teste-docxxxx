<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = new User([
            "name" => "Administrador",
            "email" => "admin@docteka.com",
            "password" => Hash::make("12345678")
        ]);
        $user->save();

        // Generate a sample API Token and save it to database (not recommended at all, used here only for testing)
        $token = $user->createToken('api-token');
        $user->api_token = $token->plainTextToken;
        $user->save();
    }
}

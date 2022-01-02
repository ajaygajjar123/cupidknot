<?php


namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

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
            'first_name' => "user",
            'last_name' => "User",
            'bod' => "1974-09-13",
            "role" => "0",
            'email' => "user@gmail.com",
            'gender' => "male",
            'annual_income' => "15000",
            'occupation' => 'business',
            'family_type' => 'nuclear',
            'manglik' => 'no',
            'email_verified_at' => now(),
            'password' => bcrypt('user@123'),
        ]);
    }
}

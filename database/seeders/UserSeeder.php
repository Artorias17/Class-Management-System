<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [

                'first_name'  => "Admin",
                "last_name" => "Mentor",
                "mobile_number" => "52471527324",
                "is_teacher" => true,
                'email' => "example@example.com",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [

                'first_name'  => "Student",
                "last_name" => "One",
                "mobile_number" => "12471527324",
                "is_teacher" => false,
                'email' => "examplestudent1@example.com",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [

                'first_name'  => "Student",
                "last_name" => "Two",
                "mobile_number" => "22471527324",
                "is_teacher" => false,
                'email' => "examplestudent2@example.com",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]
        ];

        foreach ($users as $u){
            $temp = new User($u);
            $temp->save();
        }
    }
}

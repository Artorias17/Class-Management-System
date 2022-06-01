<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

                'first_name'  => "Richie",
                "last_name" => "Rich",
                "mobile_number" => "01722222222",
                "is_teacher" => true,
                'email' => "rr@admin.com",
                'email_verified_at' => now()->subMonth(1),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [

                'first_name'  => "Victor",
                "last_name" => "Ross",
                "mobile_number" => "01401010101",
                "is_teacher" => false,
                'email' => "vic@zmail.com",
                'email_verified_at' => now()->subMonth(2),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now()->subMonth(2)
            ],
            [

                'first_name'  => "Bridget",
                "last_name" => "Parker",
                "mobile_number" => "01345678944",
                "is_teacher" => false,
                'email' => "parker@zmail.com",
                'email_verified_at' => now()->subMonth(5),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now()->subMonth(5)
            ],
            [

                'first_name'  => "Randy",
                "last_name" => "Jones",
                "mobile_number" => "01312312312",
                "is_teacher" => false,
                'email' => "randy.jones@yippe.com",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now()
            ],
            [

                'first_name'  => "Valerie",
                "last_name" => "Hawkins",
                "mobile_number" => "01122448866",
                "is_teacher" => false,
                'email' => "v123@example.com",
                'email_verified_at' => now()->subMonth(1),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now()->subMonth(1)
            ],
            [

                'first_name'  => "Levi",
                "last_name" => "Bryant",
                "mobile_number" => "01487220020",
                "is_teacher" => false,
                'email' => "lbryant@neutron.com",
                'email_verified_at' => now(),
                'password' => Hash::make("password"),
                'remember_token' => Str::random(10),
                'created_at' => now()->subMonth(1)
            ]
        ];

        foreach ($users as $u){
            $temp = new User($u);
            $temp->save();
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Tuition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TuitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tuitions = [
            [
                "user_id" => "2",
                "created_at" => now()->subMonth(2),
                "updated_at" => now()->subMonth(2)
            ],
            [
                "user_id" => "3",
                "created_at" => now()->subMonth(5),
                "updated_at" => now()->subMonth(5)
            ],
            [
                "user_id" => "2",
                "created_at" => now()->subMonth(1),
                "updated_at" => now()->subMonth(1)
            ],
            [
                "user_id" => "4",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "user_id" => "5",
                "created_at" => now()->subMonth(1),
                "updated_at" => now()->subMonth(1)
            ],
            [
                "user_id" => "6",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "user_id" => "6",
                "created_at" => now()->subMonth(1),
                "updated_at" => now()->subMonth(1)
            ],
        ];

        foreach ($tuitions as $t){
            $tuition = new Tuition($t);
            $tuition->save();
        }
    }
}

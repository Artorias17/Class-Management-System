<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class HealthCheckController extends Controller
{
    public function __invoke()
    {
        $data = [
            'server' => 'OK',
            'database' => 'OK'
        ];

        try {
            DB::connection()->getPdo();

            // Log the successful database connection
            Log::info('Healthy server with successful database connection.');

            return response()->json($data);
        }
        catch (\Exception $e) {
            // Return a 500 response with the error message
            $data['database'] = 'ERROR';
            
            // Log the error message
            Log::error("Healthy server but unsuccessful database connection.\nError: " . $e->getMessage());
            
            return response()->json($data, 500);
        }
    }
}
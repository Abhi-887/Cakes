<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;

class SystemStatusService
{
    public static function checkServerStatus()
    {
        try {
            DB::connection()->getPdo();
            return true; // Server is up
        } catch (\Exception $e) {
            return false; // Server is down
        }
    }
}

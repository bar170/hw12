<?php
namespace App\Services;

use App\Models\Breakpoint;

class GeoService
{
    public static function distance(Breakpoint $start, Breakpoint $end): float
    {
        $earthRadius = 6371; // км

        $dLat = deg2rad($end->latitude - $start->latitude);
        $dLon = deg2rad($end->longitude - $start->longitude);

        $a = sin($dLat/2) * sin($dLat/2) +
             cos(deg2rad($start->latitude)) * cos(deg2rad($end->latitude)) *
             sin($dLon/2) * sin($dLon/2);

        $c = 2 * atan2(sqrt($a), sqrt(1-$a));

        return $earthRadius * $c;
    }
}

?>
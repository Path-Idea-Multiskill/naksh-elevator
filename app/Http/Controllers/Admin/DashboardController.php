<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ElevatorType;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        // Elevator Statistics
        $totalElevators = ElevatorType::count();

        $activeElevators = ElevatorType::where(
            'status',
            true
        )->count();

        $inactiveElevators = ElevatorType::where(
            'status',
            false
        )->count();


        // Service Statistics
        $totalServices = Service::count();

        $activeServices = Service::where(
            'status',
            true
        )->count();

        $inactiveServices = Service::where(
            'status',
            false
        )->count();


        // Recent Data
        $recentElevators = ElevatorType::latest()
            ->take(5)
            ->get();

        $recentServices = Service::latest()
            ->take(5)
            ->get();


        return view(
            'admin.dashboard',
            compact(
                'totalElevators',
                'activeElevators',
                'inactiveElevators',

                'totalServices',
                'activeServices',
                'inactiveServices',

                'recentElevators',
                'recentServices'
            )
        );
    }
}
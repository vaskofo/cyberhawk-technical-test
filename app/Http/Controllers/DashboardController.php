<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurbineRequest;
use App\Models\Turbine;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Dashboard', [
            'card_info' => [
                'turbine_count' => Turbine::count(),
                'turbine_grade_avg' => round(Turbine::selectRaw('AVG(blade_grade + rotor_grade + hub_grade + generator_grade) / 4 as avg')->first()?->avg ?? 0, 2),
            ],
        ]);
    }
}

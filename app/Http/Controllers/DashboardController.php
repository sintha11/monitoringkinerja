<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonitoringKinerja;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // load data dari table sliders
        $monitoringKinerja = MonitoringKinerja::all();
        $TotalmonitoringKinerja = MonitoringKinerja::all()->count();
        $Totaluser = User::all()->count();

        return view('dashboard', [
            'monitoringKinerja' => $monitoringKinerja,
            'TotalmonitoringKinerja' => $TotalmonitoringKinerja,
            'Totaluser' => $Totaluser
        ]);
    }
}

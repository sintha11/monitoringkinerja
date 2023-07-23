<?php

namespace App\Exports;

use App\Models\MonitoringKinerja;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportMonitoringKinerja implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MonitoringKinerja::all();
    }
}

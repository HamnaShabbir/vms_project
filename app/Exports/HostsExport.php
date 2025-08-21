<?php

namespace App\Exports;

use App\Models\Host;
use Maatwebsite\Excel\Concerns\FromCollection;

class HostsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Host::all();
    }
}

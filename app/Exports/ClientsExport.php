<?php

namespace App\Exports;

use App\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ClientsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    public function collection()
    {
        return Client::all();
    }

    function headings(): array
    {
        return ['SN', 'Name', 'Address', 'Contact', 'Created_at', 'Deleted_at'];
    }

}
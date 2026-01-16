<?php

namespace App\Exports;

use App\Models\Penjualan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenjualanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Penjualan::select(
            'id',
            'tanggal',
            'total',
            'created_at'
        )->get();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Tanggal',
            'Total',
            'Dibuat Pada'
        ];
    }
}

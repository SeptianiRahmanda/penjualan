<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;

class TransaksiExport implements 
    FromCollection, 
    WithHeadings, 
    WithStyles,
    WithColumnWidths,
    WithEvents

{
    public function collection()
    {
        return Transaksi::select(
            'id',
            'total',
            'created_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Total Transaksi',
            'Tanggal Transaksi'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [ // baris header
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => 'center',
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => 'thin',
                    ],
                ],
            ],
        ];
    }
public function registerEvents(): array
{
    return [
        \Maatwebsite\Excel\Events\AfterSheet::class => function ($event) {
            $sheet = $event->sheet->getDelegate();
            $rowCount = $sheet->getHighestRow();

            $sheet->getStyle("A1:C{$rowCount}")
                ->getBorders()
                ->getAllBorders()
                ->setBorderStyle(
                    \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                );
        },
    ];
}

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 20,
            'C' => 25,
        ];
    }
}

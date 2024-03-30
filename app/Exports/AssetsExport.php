<?php

namespace App\Exports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AssetsExport implements FromCollection, WithHeadings
{

    protected $fromDate;
    protected $toDate;

    public function __construct($fromDate, $toDate)
    {
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
    }

    public function collection()
    {
        return Asset::whereBetween('purchase_date', [$this->fromDate, $this->toDate])->get();
    }
    // public function collection()
    // {
    //     return Asset::all();
    // }

    public function headings(): array
    {
        return [
            'ID',
            'Asset Type Name',
            'Description',
            'Purchase Date',
            'Purchase Price',
            'Condition',
            'Location',
            'Used By',
            'Status',
        ];
    }
}

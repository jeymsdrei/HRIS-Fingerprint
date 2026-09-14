<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class GenericExport implements FromArray, WithHeadings, WithTitle
{
    public function __construct(
        private array $data,
        private array $headings,
        private string $sheet = 'Report',
    ) {}

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        return $this->headings;
    }

    public function title(): string
    {
        return $this->sheet;
    }
}

<?php

namespace App\Exports;

use App\Models\Employee;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;


class ExportEmployees implements FromCollection, WithHeadings, WithStyles, WithMapping
{

    /**
     * @return \Illuminate\Support\Collection
     */

    public $search;
    public $genderSearch;
    public $fromDate;
    public $toDate;

    public function __construct($search,$fromDate,$toDate,$genderSearch)
    {
        $this->search = $search;
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
        $this->genderSearch = $genderSearch;
    }

    public function headings(): array
    {
        return [

            'Name',
            'Birthday',
            'Nic',
            'Gender',
            'Address',
            'Email',
            'Mobile',
            'Section',
            'Joined Date',
            'Employement Type',
            'Work Schedule',
        ];
    }

    public function map($user): array
    {
        return [
            $user->initials .' ' . $user->first_name .' ' .$user->middle_name .' ' .$user->last_name,
            $user->dob,
            $user->nic,
            $user->gender,
            $user->address,
            $user->email,
            $user->mobile,
            $user->section->section,
            Carbon::parse($user->joined_date)->toDateString(),
            $user->section->work_schedule->toString(),
        ];
    }

    public function collection()
    {
        $employeesQueay = Employee::with('bank', 'section');


        // $teachersQuery = User::query()->where('type', UserTypeEnum::TEACHER);

        if ($this->search) {
            $employeesQueay->where(function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('mobile', 'like', '%' . $this->search . '%')
                    ->orWhere('nic', 'like', '%' . $this->search . '%')

                    ->orWhere('gender', 'like', '%' . $this->search . '%')
                  ->orWhere('joined_date', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->genderSearch) {
            $employeesQueay->where('gender', $this->genderSearch);
        }
        if ($this->fromDate && $this->toDate ) {
            $employeesQueay->whereBetween('joined_date',array($this->fromDate,$this->toDate));
        }

        $employees = $employeesQueay->get();

        return $employees;
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();

        $sheet->getStyle('A1:K1')
            ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);

        // $sheet->setSize['1',50];

        $sheet->getRowDimension(1)->setRowHeight(30);

        $sheet->getColumnDimension('A')->setWidth(60);
        $sheet->getColumnDimension('B')->setWidth(40);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(20);
        $sheet->getColumnDimension('H')->setWidth(20);
        $sheet->getColumnDimension('I')->setWidth(20);
        $sheet->getColumnDimension('J')->setWidth(20);
        $sheet->getColumnDimension('K')->setWidth(80);


        for ($row = 2; $row <= $lastRow; $row++) {
            $sheet->getStyle('B' . $row . ':I' . $row)->applyFromArray([
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],

            ]);
        }
        // for ($row = 2; $row <= $lastRow; $row++) {
        //     $sheet->getStyle('F' . $row . ':M' . $row)->applyFromArray([
        //         'alignment' => [
        //             'horizontal' => Alignment::HORIZONTAL_CENTER,
        //             'vertical' => Alignment::VERTICAL_CENTER,
        //         ],

        //     ]);
        // }

        $sheet->getStyle('A1:K1')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'fill' => [
            //     // 'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            //     'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFFFFF',
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ]);
        return [
            // 1    => [
            //     'alignment' => [
            //         'horizontal' => Alignment::HORIZONTAL_CENTER,
            //         'vertical' => Alignment::VERTICAL_CENTER,
            //     ],
            //     'font' => [
            //         'bold' => true,
            //     ],

            // ],

        ];

    }

}

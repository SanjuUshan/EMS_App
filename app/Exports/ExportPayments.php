<?php

namespace App\Exports;

use App\Enums\PaymentStatus;
use App\Models\Payment;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ExportPayments implements FromCollection, WithHeadings, WithStyles, WithMapping
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

             'EmployeeName',
             'Employee NIC',
             'Basic Salary',
             'Paid Amount',
             'Paid Date',
             'Paid Method',
         ];
     }

     public function map($user): array
    {
        return [
            $user->employee->first_name .' ' .$user->employee->middle_name .' ' .$user->employee->last_name,
            $user->employee->nic,
            $user->basic_salary,
            $user->pay_amount,
            Carbon::parse($user->pay_date)->toDateString(),
            $user->pay_mode->toString(),
            // $user->email,
            // $user->mobile,
            // $user->joined_date,
            // $user->section->section,
            // $user->section->work_schedule->toString(),
        ];
    }
    public function collection()
    {
        $paidResultsQuery = Payment::with('employee')->where('status', PaymentStatus::PAID->value);

        if ($this->search) {
            $paidResultsQuery->whereHas('employee', function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('mobile', 'like', '%' . $this->search . '%')
                    ->orWhere('nic', 'like', '%' . $this->search . '%')
                    ->orWhere('gender', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->fromDate && $this->toDate ) {

            $paidResultsQuery->whereBetween('pay_date',array($this->fromDate,$this->toDate));
        }

        $genders = [
            ['id' => '1', 'name' => 'Male'],
            ['id' => '2', 'name' => 'Female'],

        ];
        if ($this->genderSearch) {
            $paidResultsQuery->whereHas('employee', function ($query) {
                $query->where('gender', $this->genderSearch);
            });
        }

        $paidResults = $paidResultsQuery->get();

        return $paidResults;
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
        $sheet->getColumnDimension('C')->setWidth(40);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20);
        // $sheet->getColumnDimension('F')->setWidth(20);
        // $sheet->getColumnDimension('G')->setWidth(20);
        // $sheet->getColumnDimension('H')->setWidth(20);
        // $sheet->getColumnDimension('I')->setWidth(20);
        // $sheet->getColumnDimension('J')->setWidth(20);
        // $sheet->getColumnDimension('K')->setWidth(80);

        for ($row = 2; $row <= $lastRow; $row++) {
            $sheet->getStyle('B' . $row . ':F' . $row)->applyFromArray([
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],

            ]);
        }

        $sheet->getStyle('A1:F1')->applyFromArray([
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
    }

}

<?php

namespace App\Livewire\Admin;

use App\Enums\EmployerTypeEnum;
use App\Enums\LeaveStatus;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Inquiry;
use App\Models\Leave;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class AdminDashboard extends Component
{
    public $empTotal;
    public $empLeaveRequests;
    public $weekdaysAttendees;
    public $weekendAttendees;
    public $dayOfWeekAttendees;
    public $inquiryCount;
    public $supervisorCount;

    public function mount()
    {

        $this->countAttendeesByDayOfWeek();
    }


    private function countAttendeesByDayOfWeek()
    {
        // Initialize counts for each day of the week
    $this->dayOfWeekAttendees = [
        'Monday' => 0,
        'Tuesday' => 0,
        'Wednesday' => 0,
        'Thursday' => 0,
        'Friday' => 0,
        'Saturday' => 0,
        'Sunday' => 0,
    ];

    // Fetch attendance records for the current month
    $attendances = Attendance::whereMonth('date', Carbon::now()->month)
                             ->whereYear('date', Carbon::now()->year)
                             ->get();

    foreach ($attendances as $attendance) {
        $dayOfWeek = Carbon::parse($attendance->date)->englishDayOfWeek;
        if (array_key_exists($dayOfWeek, $this->dayOfWeekAttendees)) {
            $this->dayOfWeekAttendees[$dayOfWeek]++;
        }
    }
    }


    public function render()
    {

        $employees = Employee::all();
        // dump($employees);
        $this->empTotal = count($employees);

        $leaves = Leave::where('status', LeaveStatus::REQUESTING)->get();
        $this->empLeaveRequests = count($leaves);

        $inquiries = Inquiry::all();
        $this->inquiryCount = count($inquiries);

        $supervisors = Employee::where('role',EmployerTypeEnum::SUPERVISOR->value)->get();
        $this->supervisorCount = count($supervisors);
        // dump( $this->weekendAttendees);

        return view('livewire.admin.admin-dashboard');
    }
}

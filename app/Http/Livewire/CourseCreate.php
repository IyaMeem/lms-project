<?php

namespace App\Http\Livewire;

use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Models\Course;
use App\Models\Period;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CourseCreate extends Component
{

    public $name;
    public $description;
    public $price;
    public $selectedDays = [];
    public $time;
    public $end_date;

    public $days = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
    ];

    protected $rules = [
        'name' => 'required|unique:courses,name',
        'description' => 'required',
        'price' => 'required',
    ];

    public function formSubmit() {
        $this->validate();

        $course = Course::create([
            'name' => $this->name,
            'slug' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'user_id' => Auth::user()->id
        ]);

        // check how many sunday available
        $i = 1;
        $start_date = new DateTime(Carbon::now());
        $endDate =   new DateTime($this->end_date);
        $interval =  new DateInterval('P1D');
        $date_range = new DatePeriod($start_date, $interval, $endDate);
        foreach ($date_range as $date) {
            foreach ($this->selectedDays as $day) {
                if ($date->format("l") === $day) {
                    Period::create([
                        'name' => $this->name . ' #' . $i++,
                        'week_day' => $day,
                        'class_time' => $this->time,
                        'end_date' => $this->end_date,
                        'class_date' => $date,
                        'course_id' => $course->id,
                    ]);
                }
            }
        }
        flash()->addSuccess('Course created successfully');
    }

    public function render()
    {
        return view('livewire.course-create');
    }
}

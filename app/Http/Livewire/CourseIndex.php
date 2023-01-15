<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CourseIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $courses=Course::paginate(10);
        return view('livewire.course-index', [
            'courses'=> $courses
        ]);
    }
}

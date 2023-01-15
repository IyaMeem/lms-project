<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        return view('course.index');
    }

    public function create()
    {
        return view('course.create');
    }

    public function edit($id)
    {
        return view('course.edit', [
            'course_id' => $id,
        ]);
    }

    public function show($id)
    {
        $course = Course::where('id', $id)->with('periods')->first();

        return view('course.show', [
            'course' => $course,
            // 'id' => $id
        ]);
    }
}
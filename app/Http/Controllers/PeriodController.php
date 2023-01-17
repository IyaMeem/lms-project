<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function show($id){
        return view('course.preoid.show', [
            'id' => $id,
        ]);
    }

    public function edit($id){
        return view('course.period.edit',[
            'id'=> $id,
        ]);
    }
}

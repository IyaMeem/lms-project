<?php

namespace App\Http\Livewire;

use App\Models\Period;
use Livewire\Component;

class ClassShow extends Component
{
    public $class_id;

    public function render()
    {
        $class = Period::findOrFail($this->class_id);
        return view('livewire.class-show', [
            'class' => $class
        ]);
    }
}

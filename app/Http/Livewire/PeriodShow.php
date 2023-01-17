<?php

namespace App\Http\Livewire;

use App\Models\Period;
use Livewire\Component;

class PeriodShow extends Component
{
    public $period_id;

    public function render()
    {
        $period = Period::findOrFail($this->period_id);
        return view('livewire.period-show', [
            'period' => $period
        ]);
    }
}

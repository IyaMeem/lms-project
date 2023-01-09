<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use Livewire\Component;

class LeadEdit extends Component
{
    public $lead_id;

    public function render()
    {
        $lead = Lead::findOrFail($this->lead_id);
        return view('livewire.lead-edit', [
            'lead' => $lead
        ]);
    }
}

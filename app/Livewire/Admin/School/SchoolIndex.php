<?php

namespace App\Livewire\Admin\School;

use App\Models\School;
use Livewire\Component;

class SchoolIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.school.school-index', [
            'schools' => School::latest()->paginate(5),
        ]);
    }
}

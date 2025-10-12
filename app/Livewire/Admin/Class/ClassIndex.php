<?php

namespace App\Livewire\Admin\Class;

use App\Models\SchoolClass;
use Livewire\Component;

class ClassIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.class.class-index', [
            'schoolClasses' => SchoolClass::all(),
        ]);
    }
}

<?php

namespace App\Livewire\Admin\Chapter;

use App\Models\Chapter;
use Livewire\Component;

class ChapterIndex extends Component
{
    public $chapters;

    public function mount()
    {

        $this->chapters = Chapter::with(['schoolClass', 'subject'])
            ->orderBy('school_class_id', 'desc')
            ->get();
    }

    public function delete($id)
    {
        Chapter::findOrFail($id)->delete();
        flash()->success('Chapter deleted successfully!');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin.chapter.chapter-index');
    }
}

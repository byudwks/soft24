<?php

namespace App\Livewire\Software;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Software as ModelSoftware;
use App\Models\Os;


class Software extends Component
{
    public $search='';

    use WithPagination;
    protected $paginationTheme = 'tailwind';

    protected $listeners = ['showDetail'];

    public function showDetail($slug)
    {
        $this->emit('openModal', 'show-detail', ['slug' => $slug]);
    }

    public function render()
    {
         $Software = ModelSoftware::latest()
            ->filter(request(['search', 'os']))
            ->with('os')
            ->paginate(2)
            ->withQueryString();

    return view('livewire.software.software', [
        'Software' => $Software,
        ]);
    }

    
}

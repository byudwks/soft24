<?php

namespace App\Livewire\Software;

use Livewire\Component;
use App\Models\Coment as ModelsComent;
use App\Models\Software;
use App\Models\User;
use Filament\Notifications\Notification;


class Coment extends Component
{

    Public $komentar, $Soft, $nama, $email;
    Public $coment_id;
    

    public function mount($id) {
        $this->Soft = Software::find($id);
    }

    public function render()
    {
        return view('livewire.software.coment', [
            'coment' => ModelsComent::With('children')
                        ->where('soft_id', $this->Soft->id)
                        ->whereNull('coment_id')
                        ->latest()
                        ->get(),
            'total_coment' => ModelsComent::Where('soft_id', $this->Soft->id)->count(),
        ]);
    }
    
    public function store(){
        $this->validate([
            'email' => 'required|email',
            'nama' => 'required|string|max:255',
            'komentar' => 'required|string',
        ]);

        $komentar = ModelsComent::create([
            'soft_id' => $this->Soft->id,
            'nama' => $this->nama,
            'email' => $this->email,
            'komentar' => $this->komentar,
        ]);
        
        $this->komentar = null;
        $this->nama = null;
        $this->email = null;
        }

    public function SelectReply($id) {
        $this->coment_id = $id;
    }

    public function reply(){
        $this->validate([
            'email' => 'required|email',
            'nama' => 'required|string|max:255',
            'komentar' => 'required|string',
        ]);

        $komentar = ModelsComent::find($this->coment_id);
        $komentar = ModelsComent::create([
            'soft_id' => $this->Soft->id,
            'nama' => $this->nama,
            'email' => $this->email,
            'komentar' => $this->komentar,
            'coment_id' => $komentar->coment_id ? $komentar->coment_id : $komentar->id,
        ]);
        
        // return redirect()->route('detailsoft', $this->Soft->slug);
        $this->hideForm();
        $this->komentar =NULL;
        $this->nama =NULL;
        $this->email =NULL;
        $this->coment_id =NULL;
    }

     public function hideForm()
    {
        $this->coment_id = false; // Sembunyikan form
    }
    
    
}

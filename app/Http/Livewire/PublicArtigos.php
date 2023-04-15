<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Srevista;

class PublicArtigos extends Component
{
    public function render()
    {
        $data = [];

        $srevista = Srevista::all();
        $data['srevista'] = $srevista;

        return view('livewire.public-artigos', $data);
    }
}

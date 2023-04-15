<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Nrevista;

class ShowArticle extends Component
{
    public function render()
    {

        $data = [];

        $nrevista = DB::table('nrevista')
            ->join('usuarios', 'nrevista.autor_id', '=', 'usuarios.id')
            ->select('usuarios.*', 'nrevista.*')
            ->get();
        $data['nrevista'] = $nrevista;
        
        
        return view('livewire.show-article', $data);
    }
}

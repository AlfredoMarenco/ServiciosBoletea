<?php

namespace App\Http\Livewire;

use App\Models\ClientUnification;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class UnificationTable extends Component
{
    use WithPagination;
    public $pagePag = '10';
    public $search = '';
    public $carbon;
    
    public function render()
    {   
        
        return view('livewire.unification-table',[
            'registros' => ClientUnification::where('descripcion', 'LIKE', "%{$this->search}%")
            ->orderBy('created_at','DESC')
            ->paginate($this->pagePag),
            'carbon' => new Carbon()
        ]);
    }
}

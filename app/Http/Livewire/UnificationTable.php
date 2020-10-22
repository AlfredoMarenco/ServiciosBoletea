<?php

namespace App\Http\Livewire;

use App\Models\ClientUnification;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class UnificationTable extends Component
{
    use WithPagination;
    public $search = '';
    public $carbon;
    
    public function render()
    {   
        
        return view('livewire.unification-table',[
            'registros' => ClientUnification::all(),
            'carbon' => new Carbon()
        ]);
    }
}

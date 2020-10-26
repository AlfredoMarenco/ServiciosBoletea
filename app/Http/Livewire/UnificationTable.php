<?php

namespace App\Http\Livewire;

use App\Models\ClientUnification;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class UnificationTable extends Component
{
    use WithPagination;
    public $pagePag = '10';
    public $search = '';
    public $carbon;
    
    public function render()
    {   
        return view('livewire.unification-table',[
            'registros' => ClientUnification::whereHas('asesor', function (Builder $query) {
                $query->where('name', 'like', "%{$this->search}%");
            })
            ->orWhereHas('user', function (Builder $query) {
                $query->where('name', 'like', "%{$this->search}%");
            })
            ->orWhere('descripcion', 'LIKE', "%{$this->search}%")
            ->orWhere('created_at', 'LIKE', "%{$this->search}%")
            ->orderBy('created_at','DESC')
            ->paginate($this->pagePag),
            'carbon' => new Carbon()
        ]);
    }
}

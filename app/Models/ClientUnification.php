<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientUnification extends Model
{
    use HasFactory;


    public function asesor(){
        return $this->belongsTo(Asesor::class , 'asesor_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

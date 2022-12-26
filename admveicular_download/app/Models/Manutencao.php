<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manutencao extends Model
{
    use HasFactory;
    protected $dt_manutencao = ['date']; 
    protected $fillable = ['dt_manutencao','tx_manutencao'];

    public function veiculo(){
        return $this->belongsTo(Veiculo::class);
    }
}
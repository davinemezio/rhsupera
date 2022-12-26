<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;
    protected $fillable = [
        'marca',
        'ano',
        'placa',
        'modelo'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function manutencaos(){
       return $this->hasMany(Manutencao::class);
    }
}

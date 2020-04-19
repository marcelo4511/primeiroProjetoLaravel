<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'estoque',
        'preco',
        'observacao',
        'categoria_id'
    ];
    
    public function teste(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }
    
}

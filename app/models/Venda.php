<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas';

    protected $date = ['updated_at','created_at'];

    protected $fillable = [
        'nomevendedor',
        'datavenda',
        'total',
        'cliente_id'
    ];
    public function clientes(){
        return $this->belongsTo(Cliente::class,'cliente_id');
    }

}

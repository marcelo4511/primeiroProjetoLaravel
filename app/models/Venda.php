<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas';

    protected $date = ['updated_at','created_at'];

    protected $fillable = [
        'produtovenda_id',
        'cliente_id'
    ];

}

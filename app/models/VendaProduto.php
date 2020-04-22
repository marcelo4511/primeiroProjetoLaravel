<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class VendaProduto extends Model
{
    protected $table = 'venda_produto';

    protected $date = ['updated_at','created_at'];

    protected $fillable = [
        'precovenda',
        'estoque',
        'desconto',
        'total',
        'produto_id'
    ];
    public function produtos(){
        return $this->belongsTo(Produto::class,'produto_id');
    }

}

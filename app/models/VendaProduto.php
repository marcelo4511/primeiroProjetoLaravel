<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class VendaProduto extends Model
{
    protected $table = 'vendas_produtos';

    protected $date = ['updated_at','created_at'];

    protected $fillable = [
        'precovenda',
        'estoque',
        'desconto',
        'subtotal',
        'produto_id',
        'venda_id'
    ];
    public function produtos(){
        return $this->belongsTo(Produto::class,'produto_id');
    }
    public function vendas(){
        return $this->belongsTo(Venda::class,'venda_id');
    }
}

<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $date = ['updated_at','created_at'];

    protected $fillable = [
        'nome',
        'idade',
        'email',
        'cpf_teste',
        'data',
        'fone',
        'categoria_id',
        'produto_id'
    ];

    public function categorias(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }

    public function produtos(){
        return $this->belongsTo(Produto::class,'produto_id');
    }

    public function getCpfAttribute(){
        $cpf = $this->attributes['cpf_teste'];
        return substr($cpf,0,3). '.' . substr($cpf,3,3). '.' . substr($cpf,7,3). '.' . substr($cpf,-2);

    }

    public function getFoneAttribute(){
        $fone = $this->attributes['fone'];
        return '('.substr($fone,0,2).')'.substr($fone,2,4).'-'.substr($fone,-4);
    }


}

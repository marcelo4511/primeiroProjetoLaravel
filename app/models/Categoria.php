<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $date = ['created_at','updated_at'];

   // protected $dateFormat = 'd/m/y';

    protected $fillable = [
        'nome'
       
    ];
   
}

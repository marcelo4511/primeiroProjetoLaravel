<?php
  
namespace App\Exports;
  
use App\models\Categoria;
use Maatwebsite\Excel\Concerns\FromCollection;
  
class categoriaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Categoria::all();
    }
}
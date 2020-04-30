<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\Categoria;
use App\exports\CategoriaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ControladorCategoria extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(){
        
        $cats = Categoria::all();
        return view('categorias.index',compact('cats'));
    }
    public function create()
    {
        return view('categorias.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $cat = new Categoria();
        $cat->nome = $request->input('nome');
        $cat->save();
        return redirect('categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Categoria::find($id);
        //var_dump($cat).exit;
        return view('categorias.show',compact('cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function excel(){
        return Excel::download(new CategoriaExport, 'categoria.xlsx');
        return view('/categorias');
    }
    public function pdf(){
        $cats = Categoria::all();
        return \PDF::loadView('categorias.index',compact('cats'))
    
       // $pdf->save(storage_path().'_filename.pdf');
        // Finally, you can download the file using download function
        ->download('categoria.pdf');
    }
    public function edit($id)
    {
        $cat = Categoria::find($id);
        if(isset($cat)) {
            return view('categorias.edit', compact('cat'));
        }
        return redirect('categorias.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = Categoria::find($id);
        if(isset($cat)) {
            $cat->nome = $request->input('nomeCategoria');
            $cat->save();
        }
        return redirect('categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Categoria::find($id);
        if (isset($cat)) {
            $cat->delete();
        }
        return redirect('categorias');
    }

    
    public function search(Request $request){
        
       $search = $request->get('search');
       $cats = Categoria::where('nome','like','%' .$search. '%')->paginate(5);
       return view('categorias.index',compact('cats'));
    
    }
    
}
































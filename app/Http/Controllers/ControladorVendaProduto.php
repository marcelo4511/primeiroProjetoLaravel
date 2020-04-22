<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\VendaProduto;
use App\models\Produto;

class ControladorVendaProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*DB::table('venda_produto')
        ->join('produtos','produtos.id','=','venda_produto.produtos_id')
        ->select('venda_produto.id','venda_produto','venda_produto.')
        ->get();
        return view('vendas.index');*/
        $prods = Produto::all();
        $vendas = VendaProduto::all();
        return view ('vendas.index', compact('vendas','prods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $vendaproduto = new VendaProduto();
            $vendaproduto->precovenda = $request->input('precovenda');
            $vendaproduto->estoque = $request->input('estoque');
            $vendaproduto->desconto = $request->input('desconto');
            $vendaproduto->total = $request->input('total');
            $vendaproduto->produto_id = $request->input('produto_id');
            $vendaproduto->save();
        //$v->save();
        return redirect('vendas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venda = VendaProduto::find($id);
        if (isset($venda)) {
            $venda->delete();
        }
        return redirect('vendas');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\models\VendaProduto;
use App\models\Venda;
use App\models\Produto;
use App\models\Cliente;


class ControladorVenda extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendas = Venda::all();
        $clientes = Cliente::all();
        return view ('vendas.index', compact('vendas','clientes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $prods = Produto::all();
        $vendas = Venda::all();
        return view ('vendas.store', compact('vendas','prods','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            /*$venda= new Venda();
            $venda->cliente_id = $request->get('cliente_id');
            $venda->nomevendedor = $request->get('nomevendedor');
            $venda->datavenda = $request->get('datavenda');
            if($venda->save()){
              $id = $venda->id;
              foreach ($request->$data as $key => $v){
                  $data = new vendaProduto();
                  $data = array('venda_id'=>$id,
                                'produto_id'=>$v,
                                'precovenda'=>$request->precovenda[$key],
                                'estoque'=>$request->estoque[$key],
                                'desconto'=>$request->desconto[$key],
                                'subtotal'=>$request->subtotal[$key]);
                                VendaProduto::insert($data);
              }  
            }*/
        
            /*$vendaproduto = new VendaProduto();
            $vendaproduto->venda_id = $request->get('venda_id');
            $vendaproduto->produto_id = $request->get('produto_id');
            $vendaproduto->precovenda = $request->get('precovenda');
            $vendaproduto->estoque = $request->get('estoque');
            $vendaproduto->desconto = $request->get('desconto');
            $vendaproduto->subtotal = $request->get('subtotal');
            $vendaproduto->save();*/
            
            
           
        return Redirect::to('/vendas');
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
        //
    }
}

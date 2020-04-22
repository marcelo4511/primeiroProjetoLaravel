<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\Produto;
use App\models\Categoria;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $totalPage = 5;

    
    
    public function index(){
        $prods = Produto::paginate($this->totalPage);
        $cats = Categoria::all();
        return view('produtos.index',compact('prods','cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Categoria::All();
            return view('produtos.store', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prod = new Produto();
        $prod->nome = $request->input('nomeProduto');
            $prod->preco = $request->input('precoProduto');
            $prod->estoque = $request->input('quantidadeProduto');
            $prod->observacao = $request->input('observacaoProduto');
            $prod->categoria_id = $request->input('categoriaProduto');
        $prod->save();
        /*if ($prod) {
            return back()->with(['mensagem','um testezinho']);
        } else {
            return back()->with('message:error', 'Error');
        }*/
       return redirect('/produtos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prod = Produto::find($id);
        if (isset($prod)) {
            return json_encode($prod);            
        }
        return response('Produto não encontrado', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod = Produto::find($id);
        $cats = Categoria::All();
        if(isset($prod,$cats)) {
            return view('produtos.edit', compact('prod','cats'));
        }
        return redirect('/produtos');
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
        $prod = Produto::find($id);
        if (isset($prod)) {
            $prod->nome = $request->input('nomeProduto');
            $prod->preco = $request->input('precoProduto');
            $prod->estoque = $request->input('quantidadeProduto');
            $prod->observacao = $request->input('observacaoProduto');
            $prod->categoria_id = $request->input('categoriaProduto');
           
            $prod->save();
        }
        return redirect('/produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Produto::find($id);
            $prod->delete();
        return redirect('/produtos');
    }


    public function search(Request $request){
        
        $cats = Categoria::all();

        $search = $request->all();

        $prods = Produto::join('categorias','categorias.id', '=','produtos.categoria_id')
        ->select('produtos.id','produtos.nome','produtos.categoria_id','produtos.observacao','produtos.preco','produtos.estoque')
        
        ->where('produtos.nome','like','%' .$search['nome']. '%')
        ->where('categoria_id','like','%' .$search['categoria_id']. '%')
        ->paginate(5);
        
        return view('produtos.index',compact('prods','cats'));
     
     }
}

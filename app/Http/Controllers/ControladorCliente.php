<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\models\Cliente;
use App\models\Categoria;
use App\models\Produto;

class ControladorCliente extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   private $teste;
   
   public function __construct(){
       $this->middleware('auth');
   }
    public function index()
    {
        $cats = Categoria::all();
        $prods = Produto::all();
        $clientes = Cliente::all();
        return view ('clientes.index', compact('clientes','prods','cats'));
    }

    public function create()
    {
        $cats = Categoria::all();
        $prods = Produto::all();
       
        return view('clientes.store',compact('cats','prods'));
    }

    public function store(Request $request)
    {
        
        $regras = [
            'nome'          => 'required|min:3|unique:clientes|max:40',
            'cpf_teste'     => 'required',
            'idade'         => 'required',
            'fone'          => 'required|min:14',
            'data'          => 'required',
            'email'         => 'required|email'
        ];
        $mensagens = [ 
            'nome.required'  => 'O nome é requerido.',
            'nome.min'       => 'É necessário no mínimo 3 caracteres no nome.',
            'required'       => 'O atributo :attribute não pode estar em branco.',  // Generico
            'email.required' => 'Digite um endereço de email.',
            'email.email'    => 'Digite um endereço de email válido'
        ];
        $request->validate($regras, $mensagens);


       
        $cli = Cliente::create([
            'nome'          => $request->nome,
            'cpf_teste'     => $request->cpf_teste,
            'idade'         => $request->idade,
            'fone'          => $request->fone,
            'data'          => $request->data,
            'email'         => $request->email,
            'categoria_id'  => $request->categoria_id,
            'produto_id'    => $request->produto_id
        ]);
        //$cli->save();
        return redirect('clientes');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        $prods = Produto::All();
        $cats = Categoria::All();

        if($cliente ||$prod ||$cats) {
            return view('clientes.edit', compact('cliente','prods','cats'));
        }
        return redirect('clientes.index');
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if(isset($cliente)) {
           $cliente->update($request->all());  
           
           /*$cli = Cliente::create([
            'nome'          => $request->nome,
            'cpf_teste'     => $request->cpf_teste,
            'idade'         => $request->idade,
            'fone'          => $request->fone,
            'data'          => $request->data,
            'email'         => $request->email,
            'categoria_id'  => $request->categoria_id,
            'produto_id'    => $request->produto_id
        ]);*/
        }
        return redirect('clientes');
    }

    public function destroy($id)
    {
        $c = Cliente::find($id);
        if (isset($c)) {
            $c->delete();
        }
        return redirect('clientes');
    }
    public function search(Request $request){
        $search = $request->all();
        
        $clientes = Cliente::where('nome','like','%' .$search['nome']. '%')
                            ->paginate(5);


        return view('clientes.index',compact('clientes'));
     
     }
}

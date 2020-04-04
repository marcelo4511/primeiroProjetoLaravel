<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cliente;

class ControladorCliente extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view ('clientes', compact('clientes'));
    }

    public function create()
    {
        // return view('novocliente');
        // 6)
        return view('novocliente');
    }

    public function store(Request $request)
    {
        // 3))
        /*
        $request->validate([
            'nome' => 'required|min:3|unique:clientes|max:20'
        ]);        
        */

        // 4))
        /*
        $request->validate([
            'nome'  => 'required|min:3|unique:clientes|max:20',
            'idade' => 'required|min:18',
            'email' => 'required|email'
        ]);        
        */

        // 5))
        $regras = [
            'nome'          => 'required|min:3|unique:clientes|max:20',
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


        // 2)
       $cli =  Cliente::create($request->all());
        $cli->save();
        return redirect('/clientes');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $c = Cliente::find($id);
        if(isset($c)) {
            return view('editarcliente', compact('c'));
        }
        return redirect('/clientes');
    }

    public function update(Request $request, $id)
    {
        $c = Cliente::find($id);
        if(isset($c)) {
           $c->update($request->all());  
        }
        return redirect('/clientes');
    }

    public function destroy($id)
    {
        $c = Cliente::find($id);
        if (isset($c)) {
            $c->delete();
        }
        return redirect('/clientes');
    }
    public function search(Request $request){
        $search = $request->only('nome','idade');
        
        $clientes = Cliente::where('nome','like','%' .$search['nome']. '%')
                             ->where('idade','like','%' .$search['idade']. '%')
                            ->paginate(5);

        if ($search = $request->only('nome','idade') == ''){
            echo "resultado não encontrado";
        }

        return view('clientes',compact('clientes'));
     
     }
}

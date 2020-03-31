@extends('layout.app', ["current" => "clientes"])

@section('body')
<!--<main role="main">
    <div class="row">-->
    <form method="get" action="/clientes/search">
{{csrf_field()}}
<label>nome</label>
<input name="nome" type="search">
<label>Idade</label>
<input name="idade" type="search">
<button type="submit">Buscar</button>
</form>
        
          <div class="card-header">
            <h5 class="card-title"> Clientes da LapCom</h5> 
          </div>
          <div class="card-body">
          
            <table class="table table-bordered table-hover" id="tabelaprodutos" >
              <thead>
                <tr> 
                
                 <th>Nome</th> 
                 <th>Idade</th> 
                 <th>Email</th> 
                 <th>CPF</th> 
                 <th>Data</th> 
                 <th>Telefone</th> 
                 <th>Ações</th>
                 </tr>
              </thead>
              <tbody>

                @foreach($clientes as $c)
                  <tr> 
                    <td>{{$c->nome}}</td> 
                    <td>{{$c->idade}}</td> 
                    <td>{{$c->email}}</td> 
                    <td>{{$c->cpf}}</td> 
                    <td>{{date('d/m/Y', strtotime($c->data))}}</td> 
                    <td>{{$c->fone}}</td> 
                    <td>
                        <a href="/clientes/editar/{{$c->id}}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="/clientes/apagar/{{$c->id}}" class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
            <div>
        <a href="/clientes/novo" class="btn btn-sm btn-primary" role="button">Novo Cliente</a>
    </div>
          </div>
        </div>


  
   
   
<!--</div>
  </main>-->
 
  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>


@endsection
@extends('layout.app', ["current" => "clientes"])

@section('body')
<!--<main role="main">
    <div class="row">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<div class="class-border">
    <form method="get" action="/clientes/search"class="form-row">
{{csrf_field()}}
<div class="form-group col-md-3">
<label>Nome do Cliente</label>
<input name="nome" type="search"class="form-control">
</div>
<div class="form-group col-md-3">
<br>
<button class="btn btn-primary"type="submit">Buscar</button>
</div>
</form>
        
          
            <h3> Clientes da LapCom</h3> 
        
        
          
            <table class="table table-bordered table-hover" id="tabelaprodutos" >
              <thead>
                <tr> 
                
                 <th>Nome</th>
                 <th>CPF</th> 
                 <th>Data</th> 
                 <th>Categoria</th>
                 <th>Produtos</th>
                 <th>Ações</th>
                 </tr>
              </thead>
              <tbody>

                @if(count($clientes)>0)
                @foreach($clientes as $c)
                  <tr> 
                    <td>{{$c->nome}}</td> 
                    <td>{{$c->cpf}}</td> 
                    <td>{{date('d/m/Y', strtotime($c->data))}}</td> 
                    <td>{{$c->categorias->nome}}</td>
                    <td>{{$c->produtos->nome}}</td>
                    <td>
                        <a href="/clientes/editar/{{$c->id}}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="/clientes/apagar/{{$c->id}}" class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                  </tr>
                @endforeach
                @else
               <div class="alert alert-info" role="alert">
                não ha clientes!
               </div>
      
             
                @endif
                 
                

              </tbody>
            </table>
        
        <a href="/clientes/novo" class="btn btn-sm btn-primary" role="button">Novo Cliente</a>
    </div>
          </div>
        </div>


  
  </div> 
   
<!--</div>
  </main>-->
 
  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>


@endsection
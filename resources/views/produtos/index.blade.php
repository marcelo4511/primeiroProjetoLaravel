@extends('layout.app', ["current" => "produtos" ])

@section('body')
<link rel="stylesheet" type="text/css" media="screen"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    
<div class="card-border">
        <form method="get" action="/produtos/search"class="form-row">

{{csrf_field()}}
    <div class="form-group col-md-3">
<label class="control-label">Nome do Produto</label>
<input name="nome"id="observacaoteste" class="form-control"type="search"required>
</div>
<div class="form-group col-md-3">
<label class="control-label">Departamento</label>
<select class="form-control"id="categoriaProdutoTeste"name="categoria_id" required>
 <option value="">Selecione </option>
                       
@foreach( $cats as $cat )
<option value="{{$cat->id}}">{{ $cat->nome }} </option>
@endforeach
</select>    
</div>

<div class="form-group col-md-3">
<label class="control-label"></label><br><br>
<button class="btn btn-primary" type="submit">Buscar</button>
</div>
</form>

         <div class="card-body">
        <h5 class="card-title">Nossos Produtos</h5>
        <table class="table table-ordered table-hover" id="tabelaProdutos">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Observação</th>
                    <th>Departamento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($prods as $prod)
            <tr> 
                    <td>{{$prod->nome}}</td> 
                    <td>{{$prod->estoque}}</td> 
                    <td>R$ {{number_format($prod->preco, 2,',','.')}}</td> 
                    <td>{{$prod->observacao}}</td> 
                  
                    <td>{{$prod->teste->nome}}</td>
                    
                    <td>
                        <a href="/produtos/editar/{{$prod->id}}" class="btn btn-sm btn-primary"><i class="fas fa-edit" aria-hidden="true"></i></a>

                        <form action="/produtos/apagar/{{$prod->id}}"method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit"onclick="myFunction()"style="width:30px" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                        
                    </td>
                  </tr>
            @endforeach
            </tbody>
        </table>
{!!$prods->links()!!} 

    </div>
    <div class="card-footer">
        <a href="/produtos/novo" class="btn btn-sm btn-primary" role="button">Novo Produto</a>
    </div>
</div>



@component('components.footer')
@endcomponent

@endsection
     
     
@section('javascript')
<script type="text/javascript">
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });
    
    
    function mascarapreco(){
        var preco = document.getElementById('precoProduto')
        preco.value = preco.value.replace(/\D/g,"")  
        preco.value = preco.value.replace(/([0-9]{2})$/g, ",$1");

        if(preco.length > 6){

         preco.value = preco.value.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
        }
    
        return preco 


    }
    function zerar(){
        var preco = document.getElementById('precoProduto')
        if (preco.value =='0,00'){
            preco.value = 'null'
        }
       
    }
   
   
    function myFunction(){
        confirm ("zdgdfhs");
    }

</script>
@endsection
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
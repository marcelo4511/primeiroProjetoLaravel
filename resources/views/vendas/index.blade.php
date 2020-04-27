@extends('layout.app', ["current" => "vendas" ])

@section('body')
<link rel="stylesheet" type="text/css" media="screen"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

<script src="https://github.com/makeusabrew/bootbox/releases/download/v4.4.0/bootbox.min.js"></script>


         <div class="card-body">
        <h5 class="card-title">Vendas</h5>
        <table class="table table-ordered table-hover" id="tabelaProdutos">
            <thead>
                <tr>
                    <th>Nome do Vendedor</th>
                    <th>Nome do cliente</th>
                    <th>Data da venda</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($vendas as $venda)
            <tr> 
                    <td>{{$venda->nomevendedor}}</td> 
                    <td>{{$venda->clientes->nome}}</td> 
                    <td>{{$venda->datavenda}}</td> 
                    <td>
                        <a href="/" class="btn btn-sm btn-primary"><i class="fas fa-edit" aria-hidden="true"></i></a>

                        <form action="/"method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit"onclick="myFunction()"style="width:30px" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                        
                    </td>
                  </tr>
            @endforeach
            </tbody>
        </table>


    </div>
    <div class="card-footer">
        <a href="/vendas/novo" class="btn btn-sm btn-primary" role="button">Nova venda</a>
    </div>



@component('components.footer')
@endcomponent

@endsection
</div>
     
     
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
        bootox.confirm ("zdgdfhs");
    }

</script>
@endsection
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
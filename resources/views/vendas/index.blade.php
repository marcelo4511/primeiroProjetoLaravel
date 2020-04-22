
@extends('layout.app', ["current" => "vendas" ])

@section('body')

<link rel="stylesheet" type="text/css" media="screen"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
   

<div class="card-border">
<div class="container">
<h3>Sistema de Vendas da LapCom</h3>
<label class="control-label">Cliente</label>
<select class="form-control">
<option value="">Selecione<option>

</select>
<br>

<div class="card border-dark">
  <div class="card-body">
  <form action="/vendas" method="POST"class="form-row">
  {{ csrf_field() }} 
<div class="form-group col-md-3" >
  <label class="control-label"style="width:250px;">Produto</label>

    <select class="form-control selectpicker"  data-live-search="true"id="produto_id"name="produto_id"required>
    <option value="">Selecione</option>
    @foreach( $prods as $prod )
                        <option value="{{$prod->id}}">{{ $prod->nome }} </option>
                        @endforeach
    </select>
</div>
    <div class="form-group col-sm-2 ">
    <label class="control-label"style="width:250px;">Preço de Venda <i class="fa fa-question-circle"  aria-hidden="true"onmouseover="informar()"></i></label>
    <input class="form-control" type="text"onblur="conta();"onkeyup="formatacao(this.preco)"id="precovenda"name="precovenda"required>
</div>
    <div class="form-group col-sm-2">
    <label class="control-label"style="width:250px;">Estoque <i class="fa fa-question-circle" aria-hidden="true"></i></label>
    <input name="estoque"id="estoque" class="form-control" onblur="conta();"type="text"required>
</div>
    <div class="form-group col-sm-2">
    <label class="control-label"style="width:250px;">Desconto (%)</label>       
    <input name="desconto"id="desconto" onblur="conta();"class="form-control"type="text" required>
</div>
<div class="form-group col-sm-2">
    <label class="control-label"style="width:250px;">Total</label>       
    <input name="total"id="total" class="form-control"type="text" value=''required readonly='true'>
</div>
    <div class="form-group col-sm-3">
    <button type="submit"id="btn"class="btn btn-success"onblur="limpar()"onclick="adicionar()"onsubmit="alertar()"><span class="glyphicon glyphicon-plus" aria-hidden="true">Adicionar</span></button>

</div>
</form>
            @if(count($vendas)>0)
<table class="table table-ordered table-hover" id="tabelavenda">
            <thead>
                <tr>
                    <th>Produtos</th>
                    <th>Preço de Venda</th>
                    <th>Estoque</th>
                    <th>Desconto</th>
                    <th>Total</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
            @foreach($vendas as $venda)
            <tr> 
                    <td>{{$venda->produtos->nome}}</td> 
                    <td>{{$venda->precovenda}}</td> 
                    <td>{{$venda->estoque}}</td> 
                    <td>{{$venda->desconto}}</td> 
                    <td>{{$venda->total}}</td> 
                    
                    <td>
        

                        <form action="/vendas/apagar/{{$venda->id}}"method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit"style="width:30px" class="btn btn-sm btn-danger"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </form>
                    </td>
                  </tr>
            @endforeach
            </tbody>
        </table>
        @endif
</div>
</div>
<br>
<a href="/" class="btn btn-sm btn-primary">Salvar</a>
<a href="/" class="btn btn-sm btn-danger">Cancelar</a>
                    
    
<br>
<br>


@component('components.footer')
@endcomponent

@endsection

@section('javascript')

<script type="text/javascript">


    function conta(){
        var preco= document.getElementById('precovenda').value;
        var estoque = document.getElementById('estoque').value;
        var desconto = document.getElementById('desconto').value;
        //var percentual = (desconto / 100);
        var total = parseFloat(preco *estoque) / desconto;
        document.getElementById('total').value = total;
    }

    function formatacao(preco){
        var preco = document.getElementById('precovenda')
        preco.value = preco.value.replace(/\D/g,"")  
        preco.value = preco.value.replace(/([0-9]{2})$/g, ",$1");

        return preco;

    }
    /*function adicionar(){
        var tabela = document.getElementById('tabelavenda')
        linha = tabela.insertRow(tabela.length),
        cell1 = linha.insertCell(0),
        cell2 = linha.insertCell(1),
        cell3 = linha.insertCell(2),
        cell4 = linha.insertCell(3),
        cell5 = linha.insertCell(4),
        cell6 = linha.insertCell(5),
        

        produtos = document.getElementById('produtos').value;
        precovenda = document.getElementById('precovenda').value;
        estoque = document.getElementById('estoque').value;
        desconto = document.getElementById('desconto').value;
        total = document.getElementById('total').value;

        cell1.innerHTML = produtos;
        cell2.innerHTML = precovenda;
        cell3.innerHTML = estoque;
        cell4.innerHTML = desconto;
        cell5.innerHTML = total;
        cell6.innerHTML = '<a onClick="delete(this)">Deletar</a>';
    }*/
    function limpar(){
        produtos = document.getElementById('produto_id').value = "";
        precovenda = document.getElementById('precovenda').value = "";
        estoque = document.getElementById('estoque').value = "";
        desconto = document.getElementById('desconto').value = "";
        total = document.getElementById('total').value = "";

    }
    function informar(){
        alert("o preço da venda é gerado conforme o lucro e afins");
    }
    document.getElementById("btn").addEventListener("click", displayDate);

function displayDate() {
        produtos = document.getElementById('produto_id');
        precovenda = document.getElementById('precovenda');
        estoque = document.getElementById('estoque');
        desconto = document.getElementById('desconto');
        total = document.getElementById('total') ;

        if(produtos.value || precovenda.value || estoque.value || desconto.value || total.value){
            alert("Cadastro de produto concluído com sucesso!");
        }else{
            alert("Prencha os campos acima!");
        }
}
   /* function reset(){
        produtos = document.getElementById('produtos').value = '';
        precovenda = document.getElementById('precovenda').value = '';
        estoque = document.getElementById('estoque').value = '';
        desconto = document.getElementById('desconto').value = '';
        total = document.getElementById('total').value = '';

    }
    
    function delete(id){
        if(confirm('e ai suave?????????')){
        row.td.parenteElement.parentElement;
        document.getElementById('tabelavenda').deleteRow(row.rowIndex);
        reset();
        }
    }*/
    
</script>
@endsection
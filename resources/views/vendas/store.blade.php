
@extends('layout.app', ["current" => "vendas" ])

@section('body')

<link rel="stylesheet" type="text/css" media="screen"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
   
   
<div class="card-border">
<div class="container">
<h3>Sistema de Vendas da LapCom</h3>
<br>
<form action="/vendas" method="POST"class="form-row">
<div class="form-group col-sm-4 ">
<label class="control-label">Cliente</label>
<select class="form-control"id="cliente_id" name="cliente_id">
<option value="">Selecione</option disabled>
@foreach( $clientes as $cliente )
                        <option value="{{$cliente->id}}">{{ $cliente->nome }} </option>
                        @endforeach
</select>
</div>
<div class="form-group col-sm-4 ">
<label class="control-label">Data da venda</label>
<input class="form-control" id="datavenda" name="datavenda"type="date"required>

</div>
<div class="form-group col-sm-4 ">
<label class="control-label">Vendedor</label>
<input class="form-control" type="text"required id="nomevendedor"name="nomevendedor"placeholder="Nome do Vendedor">
</div>
<br>
<br>
<br>
<br>
<div class="card border-dark">
  <div class="card-body">
  <div class="row">
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
    <input class="form-control" type="text"onblur="conta();"onmouseover="formatacao(this)"id="precovenda"name="precovenda"required value="0,00">
</div>
    <div class="form-group col-sm-2">
    <label class="control-label"style="width:250px;">Estoque <i class="fa fa-question-circle" aria-hidden="true"></i></label>
    <input name="estoque"id="estoque" class="form-control" onblur="conta();"type="text"required>
</div>
    <div class="form-group col-sm-2">
    <label class="control-label"style="width:250px;">Desconto (%)</label>       
    <input name="desconto"id="desconto" onblur="conta();"class="form-control"type="number" required>
</div>
<div class="form-group col-sm-2">
    <label class="control-label"style="width:250px;">Total</label>       
    <input name="subtotal"id="subtotal" class="form-control"type="text" value='0.00'maxlength="7"required readonly='true'>
</div>
    <div class="form-group col-sm-3">
    <button id="btn1"class="btn btn-success"onblur="limpar()"onclick="adicionar()"><i class="fa fa-plus" aria-hidden="true"></i></button>

</div>
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
           
            </table>
</div>
           
          
</div>
</div>
</div>



<br>
<button href="/" type="submit"id="btn"onclick="verificar()"class="btn btn-sm btn-primary">Salvar</button>
<button href="/" class="btn btn-sm btn-danger">Cancelar</button>
                    <br>
</form>
</br>

@component('components.footer')
@endcomponent

@endsection

@section('javascript')

<script type="text/javascript">


    function conta(){
        var preco= document.getElementById('precovenda').value;
        var estoque = document.getElementById('estoque').value;
        var desconto = document.getElementById('desconto').value;
        var percentual = Number.parseFloat(desconto / 100);
        var total = Number.parseFloat(preco)*Number.parseInt(estoque) * percentual;
        document.getElementById('subtotal').value = total
    }

    function formatacao(i){
        var v = i.value.replace(/\D/g,'');
	    v = (v/100).toFixed(2) + '';
	    v = v.replace(",", ".");
	    v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
	    v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
	    i.value = v;

    }
    var count = 0;
    function adicionar(){
        

        var tabela = document.getElementById('tabelavenda')
        linha = tabela.insertRow(tabela.length),
        cell1 = linha.insertCell(0),
        cell2 = linha.insertCell(1),
        cell3 = linha.insertCell(2),
        cell4 = linha.insertCell(3),
        cell5 = linha.insertCell(4),
        cell6 = linha.insertCell(5),
        

        produtos = document.getElementById('produto_id').options[document.getElementById('produto_id').selectedIndex].innerText;
        precovenda = document.getElementById('precovenda').value;
        estoque = document.getElementById('estoque').value;
        desconto = document.getElementById('desconto').value;
        total = document.getElementById('subtotal').value;

        cell1.innerHTML = produtos;
        cell2.innerHTML = precovenda;
        cell3.innerHTML = estoque;
        cell4.innerHTML = desconto;
        cell5.innerHTML = total;               
        cell6.innerHTML =  "<button class='btn btn-sm btn-danger' onclick='removeLinha(this)'><i class='fa fa-plus' aria-hidden='true'></i></button>";

    }
    function limpar(){
        produtos = document.getElementById('produto_id').value = "";
        precovenda = document.getElementById('precovenda').value = "";
        estoque = document.getElementById('estoque').value = "";
        desconto = document.getElementById('desconto').value = "";
        total = document.getElementById('subtotal').value = "";

    }
    /*function informar(){
        alert("o preço da venda é gerado conforme o lucro e afins");
    }*/
    document.getElementById("btn").addEventListener("click", displayDate);
   
    function displayDate() {
        produtos = document.getElementById('produto_id');
        precovenda = document.getElementById('precovenda');
        estoque = document.getElementById('estoque');
        desconto = document.getElementById('desconto');
        total = document.getElementById('subtotal') ;

        if(produtos.value && precovenda.value && estoque.value && desconto.value && total.value){
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

    }*/
    
   
        function removeLinha(linha) {
        if(confirm('e ai suave?????????')){
              var i=linha.parentNode.parentNode.rowIndex;
              document.getElementById('tabelavenda').deleteRow(i);
            }      
        }
    
    function verificar(){
        precovenda = document.getElementById('precovenda').value;
        if (precovenda,value = ''){
           alert("Cadastre pelo menos ums venda!!");
        }else if(precovenda > 1) {
            alert("certinhooooooooooooooooooooo")
        }
    }
    
   
</script>
@endsection
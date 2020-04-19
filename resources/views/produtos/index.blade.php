@extends('layout.app', ["current" => "produtos" ])

@section('body')

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
                    <th>Código</th>
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
                    <td>{{$prod->id}}</td>
                    <td>{{$prod->nome}}</td> 
                    <td>{{$prod->estoque}}</td> 
                    <td>R$ {{number_format($prod->preco, 2,',','.')}}</td> 
                    <td>{{$prod->observacao}}</td> 
                    
                   
                    <td>{{$prod->teste->nome}}</td>
                    
                    <td>
                        <a href="/produtos/editar/{{$prod->id}}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="/produtos/apagar/{{$prod->id}}" onclick="Confirm(Deseja excluir ?)"class="btn btn-sm btn-danger">Apagar</a>

                        
                    </td>
                  </tr>
            @endforeach
            </tbody>
        </table>
{!!$prods->links()!!} 
@if(Session::has('status'))
        <div class="alert alert-danger">
            {{Session::get('status')}}
        </div>
    @endif
       
    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" role="button" onclick="novoProduto()">Novo produto</a>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content">
            <form class="form-horizontal" id="formProduto">
                <div class="modal-header">
                    <h5 class="modal-title">Novo produto</h5>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="id" class="form-control">
                    <div class="form-group">
                        <label for="nomeProduto" class="control-label">Nome do Produto</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nomeProduto" onkeyup="maiusculo();"placeholder="Nome do produto"required>
                        </div>
                    </div>

                   
                    
                    <div class="form-group">
                        <label for="quantidadeProduto" class="control-label">Quantidade</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="quantidadeProduto" placeholder="Quantidade do produto"required>
                        </div>
                    </div>                    

                    <div class="form-group">
                        <label for="precoProduto" class="control-label">Preço</label>
                        <div class="input-group">
                            <input type="decimal" class="form-control" onmouseover=""id="precoProduto"value="0,00" onclick="zerar()"onkeyup="mascarapreco()"placeholder="Preço do produto"required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="observacaoProduto"  class="fa fa-question-circle" aria-hidden="true"class="control-label">Observação</label>
                        <div class="input-group">
                            <input type="string" class="form-control" id="observacaoProduto" placeholder="Observação"required>
                        </div>
                    </div>

                   <div class="form-group">
                        <label for="categoriaProduto" class="control-label">Categoria</label>
                        <div class="input-group">
                            <select class="form-control" id="categoriaProduto" required>
                        @foreach( $cats as $cat )
                        <option value="{{$cat->id}}">{{ $cat->nome }} </option>
                        @endforeach
                            </select>    
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
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
    
    function novoProduto() {
        $('#id').val('');
        $('#nomeProduto').val('');
        $('#quantidadeProduto').val('');
        $('#precoProduto').val('');
        $('#observacaoProduto').val('');
        $('#dlgProdutos').modal('show');
    }
    
    /*
    function carregarCategorias() {
        $.getJSON('/api/categorias', function(data) { 
            for(i=0;i<data.length;i++) {
                opcao = '<option value ="' + data[i].id + '">' + 
                    data[i].nome + '</option>';
                $('#categoriaProduto').append(opcao);
            }
        });
    }
    
    function montarLinha(p) {
        var linha = "<tr>" +
            "<td>" + p.id + "</td>" +
            "<td>" + p.nome + "</td>" +
            "<td>" + p.estoque + "</td>" +
            "<td>" + p.preco + "</td>" +
            "<td>" + p.observacao + "</td>" +
            "<td>" + p.categoria_id + "</td>" +
            "<td>" +
              '<button class="btn btn-sm btn-primary" onclick="editar(' + p.id + ')"> Editar </button> ' +
              '<button class="btn btn-sm btn-danger" onclick="remover(' + p.id + ')"> Apagar </button> ' +
            "</td>" +
            "</tr>";
        return linha;
    }
    
    function editar(id) {
        $.getJSON('/api/produtos/'+id, function(data) { 
            console.log(data);
            $('#id').val(data.id);
            $('#nomeProduto').val(data.nome);
            $('#quantidadeProduto').val(data.estoque);
            $('#precoProduto').val(data.preco);
            $('#observacaoProduto').val(data.observacao);
            $('#categoriaProduto').val(data.categoria_id);
            $('#dlgProdutos').modal('show');            
        });        
    }
    function remover(id) {
        $.ajax({
            type: "DELETE",
            url: "/api/produtos/" + id,
            context: this,
            success: function() {
                console.log('Apagou OK');
                linhas = $("#tabelaProdutos>tbody>tr");
                e = linhas.filter( function(i, elemento) { 
                    return elemento.cells[0].textContent == id; 
                });
                if (e)
                    e.remove();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    
    function carregarProdutos() {
        $.getJSON('/api/produtos', function(produtos) { 
            for(i=0;i<produtos.length;i++) {
                linha = montarLinha(produtos[i]);
                $('#tabelaProdutos>tbody').append(linha);
            }
        });        
    }
    
    */
    
    function criarProduto() {
        prod = { 
            nome: $("#nomeProduto").val(), 
            estoque: $("#quantidadeProduto").val(), 
            preco: $("#precoProduto").val(), 
            observacao: $('#observacaoProduto').val(),
            categoria_id: $("#categoriaProduto").val() 
        };
        $.post("/api/produtos", prod, function(data) {
            produto = JSON.parse(data);
            linha = montarLinha(produto);
            $('#tabelaProdutos>tbody').append(linha);            
        });
    }
    
    function salvarProduto() {
        prod = { 
            nome: $("#nomeProduto").val(), 
            estoque: $("#quantidadeProduto").val(), 
            preco: $("#precoProduto").val(), 
            observacao: $("#observacaoProduto").val(),
            categoria_id: $("#categoriaProduto").val() 
        };
        $.ajax({
            type: "PUT",
            url: "/api/produtos/" + prod.id,
            context: this,
            data: prod,
            success: function(data) {
                prod = JSON.parse(data);
                linhas = $("#tabelaProdutos>tbody>tr");
                e = linhas.filter( function(i, e) { 
                    return ( e.cells[0].textContent == prod.id );
                });
                if (e) {
                    e[0].cells[0].textContent = prod.id;
                    e[0].cells[1].textContent = prod.nome;
                    e[0].cells[2].textContent = prod.estoque;
                    e[0].cells[3].textContent = prod.preco;
                    e[0].cells[4].textContent = prod.observacao;
                    e[0].cells[5].textContent = prod.categoria_id
                }
            },
            error: function(error) {
                console.log(error);
            }
        });        
    }
    
    $("#formProduto").submit( function(event){ 
        event.preventDefault(); 
        if ($("#id").val() != '')
            salvarProduto();
        else
            criarProduto();
            
        $("#dlgProdutos").modal('hide');
    });
    
    $(function(){
        carregarCategorias();
        carregarProdutos();
    })
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
    function maiusculo(){
         var preco = document.getElementById('nomeProduto').value;
         .map(maisculo => { return nome.split(" ")
          .map(part => part.replace(regex, l => l.toUpperCase()))
          .join(" ");})
    }
    
</script>
@endsection
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
@extends('layout.app', ["current" => "produtos" ])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/produtos" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeProduto">Nome do produto</label>
                <input type="text" class="form-control" name="nomeProduto" value=""
                       id="nomeProduto" placeholder="Nome do Produto">
            </div>

            <div class="form-group">
                <label for="quantidadeProduto">Quantidade</label>
                <input type="text" class="form-control" name="quantidadeProduto" value=""
                       id="quantidadeProduto" placeholder="Quantidade">
            </div>

            <div class="form-group">
                <label for="nomePreco">preco</label>
                <input type="text" class="form-control" name="precoProduto" value=""
                       id="precoProduto" placeholder="Preço">
            </div>

            <div class="form-group">
                <label for="observacaoProduto">observacao</label>
                <input type="text" class="form-control" name="observacaoProduto" value=""
                       id="observacaoProduto" placeholder="Observação">
            </div>

            <div class="form-group">
                        <label for="categoriaProduto" class="control-label">Categoria</label>
                        <div class="input-group">
                            <select class="form-control" id="categoriaProduto"name="categoriaProduto" required>
                          
                            @foreach( $cats as $cat )
                       
                        <option value="{{$cat->id}}">{{ $cat->nome }} </option>
                        @endforeach
                            </select>    
                        </div>
                    </div>
        
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
        </form>
    </div>
</div>
        
@endsection    

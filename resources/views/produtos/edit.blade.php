@extends('layout.app', ["current" => "produtos" ])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/produtos/{{$prod->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeProduto">Nome do produto</label>
                <input type="text" class="form-control" name="nomeProduto" value="{{$prod->nome}}"
                       id="nomeCategoria" placeholder="Categoria">
            </div>

            <div class="form-group">
                <label for="quantidadeProduto">Quantidade</label>
                <input type="text" class="form-control" name="quantidadeProduto" value="{{$prod->estoque}}"
                       id="nomeCategoria" placeholder="Categoria">
            </div>

            <div class="form-group">
                <label for="nomePreco">preco</label>
                <input type="text" class="form-control" name="precoProduto" value="{{$prod->preco}}"
                       id="nomePreco" placeholder="Categoria">
            </div>

            <div class="form-group">
                <label for="observacaoProduto">observacao</label>
                <input type="text" class="form-control" name="observacaoProduto" value="{{$prod->observacao}}"
                       id="observacaoProduto" placeholder="Categoria">
            </div>

            <div class="form-group">
                        <label for="categoriaProduto" class="control-label">Categoria</label>
                        <div class="input-group">
                            <select class="form-control" id="categoriaProduto"name="categoriaProduto" required>
                            <option value="{{$prod->teste->id}}" hidden>{{ $prod->teste->nome }} </option>
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

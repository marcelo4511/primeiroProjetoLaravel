@extends('layout.app', ["current" => "categorias"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/categorias" method="POST" onsubmit="Formulario()">
            @csrf
            <div class="form-group">
                <label for="nomeCategoria">Nome da Categoria</label>
                <input type="text" class="form-control" name="nomeCategoria" 
                       id="nomeCategoria" placeholder="Categoria"required>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" >Salvar</button>
            <button type="cancel" onclick = "location.href='/categorias'"class="btn btn-danger btn-sm">Cancel</button>
        </form>
    </div>
    @if($errors->any())
                            <div class="card-footer">
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                {{$error}}
                                </div>
                            @endforeach
                            </div>
                @endif
</div>

@endsection

@section('javascript')
<script type="text/javascript">
function Formulario(){
				var nome= form.nome.value;
				
				if(nome==""){
			  alert("prencha  o campo nome");
			  form.nome.focus();
			  return false;
		  }
}
                    </script>
@endsection


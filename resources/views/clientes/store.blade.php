@extends('layout.app', ["current" => "clientes"])

@section('body')
<main role="main">
    <div class="row">
      <div class="container  col-sm-8 offset-md-2">

        <div class="card border">
          <div class="card-header">
            <h5 class="card-title">Cadastro de Cliente</h5> 
          </div>
          <div class="card-body">
            <form action="/cliente" method="POST" onsubmit="mascaras();">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="nome">Nome do Cliente</label>
                <input type="text" 
                       class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" 
                       name="nome"  id="nome" placeholder="Nome do Cliente" value="{{ old('nome') }}">
@if ($errors->has('nome'))
                <div class="invalid-feedback">
{{ $errors->first('nome') }}
                </div>
@endif
              </div>
              <div class="form-group">
                <label for="idade">Idade do Cliente</label>
                <input type="number" 
                       class="form-control {{ $errors->has('idade') ? 'is-invalid' : '' }}" 
                       name="idade"  id="idade" placeholder="Idade do Cliente" value="{{ old('idade') }}">
@if ($errors->has('idade'))
                <div class="invalid-feedback">
{{ $errors->first('idade') }}
                </div>
@endif

<div class="form-group">
                <label for="cpf_teste">CPF do Cliente</label>
                <input type="string" 
                       class="form-control {{ $errors->has('cpf_teste') ? 'is-invalid' : '' }}" 
                       name="cpf_teste" maxlength="14" id="cpf_teste" placeholder="CPF do Cliente" required onkeyup="Mascaracpf(this.cpf);"value="{{ old('cpf_teste') }}">
@if ($errors->has('cpf_teste'))
                <div class="invalid-feedback">
{{ $errors->first('cpf_teste') }}
                </div>
@endif

<div class="form-group">
                <label for="data">Data do Cliente</label>
                <input type="date" 
                       class="form-control {{ $errors->has('data') ? 'is-invalid' : '' }}" 
                       name="data"  id="data" placeholder="data do Cliente" value="{{ old('data') }}">
@if ($errors->has('data'))
                <div class="invalid-feedback">
{{ $errors->first('data') }}
                </div>
@endif

<div class="form-group">
                <label for="fone">Telefone do Cliente</label>
                <input type="string" 
                       class="form-control {{ $errors->has('fone') ? 'is-invalid' : '' }}" 
                       name="fone" maxlength="14" id="fone" placeholder="fone do Cliente" value="{{ old('fone') }}" required onkeyup="Telefone(fone);" >
@if ($errors->has('fone'))
                <div class="invalid-feedback">
{{ $errors->first('fone') }}
                </div>
@endif

             

              <div class="form-group">
                <label for="endereco">Email</label>
                <input type="text"  
                       class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" 
                       name="email"  id="email" placeholder="E-mail do Cliente" value="{{ old('email') }}">
@if ($errors->has('email'))
                <div class="invalid-feedback">
{{ $errors->first('email') }}
                </div>
@endif

<div class="form-group">
                        <label for="categoria" class="control-label">Categoria</label>
                        <div class="input-group">
                            <select class="form-control" id="categoria_id" onchange="validarForm()"name="categoria_id"required>
                            <option value="">Selecione </option>
                        @foreach( $cats as $cat )
                        <option value="{{$cat->id}}">{{ $cat->nome }} </option>
                        @endforeach
                            </select>    
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="produto_id" class="control-label">Produto</label>
                        <div class="input-group">
                            <select class="form-control" id="produto_id" name="produto_id" required>
                          
                        <option value="">Selecione </option>
                        @foreach( $prods as $prod )
                        <option value="{{$prod->id}}">{{ $prod->nome }} </option>
                        @endforeach
                            </select>    
                        </div>
                    </div>


              </div>

              <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
              <button type="reset" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
          </div>
         </div> 

      

      </div>
    </div>
  </main>
  
  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
  @component('components.footer')
@endcomponent
@endsection
  @section('javascript')
<script type="text/javascript">

  function Telefone(fone){
    var fone = document.getElementById("fone")
    fone.value = fone.value.replace(/\D/g,"")                 
    fone.value = fone.value.replace(/^(\d\d)(\d)/g,"($1) $2") 
    fone.value = fone.value.replace(/(\d{4})(\d)/,"$1-$2")    
    return fone
  }

  function Mascaracpf(cpf) {
    var cpf = document.getElementById("cpf_teste")
    cpf.value = cpf.value.replace(/\D/g,"")  
    cpf.value = cpf.value.replace(/(\d{3})(\d)/,"$1.$2")
    cpf.value = cpf.value.replace(/(\d{3})(\d)/,"$1.$2")
    cpf.value = cpf.value.replace(/(\d{3})(\d)/,"$1-$2")
    return cpf
    }

  function mascaras(){

    if(fone.value.length != 14) {
      return  alert("fone inválido")
    }
    
    if (cpf.value.length != 14) {
      return  alert("cpf inválido")
    }
  }

  
  
       /* $('select[name=categoria_id]').change(function () {
            var cats = $(this).val();
            $.get('/produtos/' + cats, function (produtos) {
                $('select[name=produto_id]').empty();
                $.each(produtos, function (key, value) {
                    $('select[name=produto_id]').append('<option value=' + value.id + '>' + value.nome + '</option>');
                });
            });
        });*/
       
        function validarForm() { 
       var optionSelect = document.getElementById("categoria_id").value;

       if(optionSelect =="3" ){ 
           document.getElementById("produto_id").disabled = false;
       }else{
           document.getElementById("produto_id").disabled = true;
       }
}
</script>
@endsection

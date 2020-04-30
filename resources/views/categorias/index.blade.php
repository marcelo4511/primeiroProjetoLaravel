@extends('layout.app', ["current" => "categorias"])

@section('body')
<link rel="stylesheet" type="text/css" media="screen"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Categorias</h5>
        <form method="get" action="/categorias/search"class="form-row">
{{csrf_field()}}
<div class="form-group col-md-3">
<input name="search" type="search"class="form-control">
</div>
<div class="form-group col-md-3">
<button type="submit" class="btn btn-primary">Buscar</button></div>
<div class="col-md-6">
</form>
</div>

@if(count($cats) > 0)
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Nome da Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
    @foreach($cats as $cat)
                <tr>
                    <td>{{$cat->nome}}</td>
                    <td>
                   <!-- <button type="submit" onclick = "location.href='/categorias/{{$cat->id}}'"i class="fa-eye"aria-hidden="true"></button>-->
                        <a href="/categorias/{{$cat->id}}" ><i class="fa fa-eye"aria-hidden="true"></i></a>
                        <a href="/categorias/editar/{{$cat->id}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        <a href="/categorias/apagar/{{$cat->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        

                    </td>
                </tr>
    @endforeach                
            </tbody>
        </table>
@endif        
    </div>
    <div class="row justify-content-md-center"style="width:2100px;">
        <div class="col-6"hidden></div>
            <div class="col-6"style="width:50px;">
                <button type="button" onclick="location.href='/exportar'" class="btn btn-success" role="button">Exportar excel <i class="fa fa-download"></i></button>
                 <button type="button" onclick="location.href='/pdf'" class="btn btn-danger" role="button">Imprimir PDF <i class="fa fa-print"></i></button>
             </div>
   </div>
    <div class="card-footer">
        <a href="/categorias/novo" class="btn btn-sm btn-primary" role="button">Nova categoria</a>
    </div>
</div>
@component('components.footer')
@endcomponent

@endsection


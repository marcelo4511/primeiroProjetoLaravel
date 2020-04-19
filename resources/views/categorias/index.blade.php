@extends('layout.app', ["current" => "categorias"])

@section('body')
<link rel="stylesheet" type="text/css" media="screen"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    
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
</form>
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
                        <a href="/categorias/editar/{{$cat->id}}"><i class="fas fa-edit" aria-hidden="true"></i></a>
                        <a href="/categorias/apagar/{{$cat->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        

                    </td>
                </tr>
    @endforeach                
            </tbody>
        </table>
@endif        
    </div>
    <div class="card-footer">
        <a href="/categorias/novo" class="btn btn-sm btn-primary" role="button">Nova categoria</a>
    </div>
</div>
@component('components.footer')
@endcomponent

@endsection


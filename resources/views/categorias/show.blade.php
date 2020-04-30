@extends('layout.app', ["current" => "categorias"])

@section('body')
<h1>Categoria {{$cat->nome}} </h1>

<h5>Criado em {{$cat->created_at->format('d/m/Y  H:i:s')}} </h5>
<h5>Atualizado em {{$cat->updated_at->format('d/m/Y  H:i:s')}} </h5>

<a href="/categorias">voltar<a>
@endsection
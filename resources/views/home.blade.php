@extends('layout.app', ["current" => "home"])

@section('body')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
   
<div class="card-border">
<div class="container">
<div class="row">
<div class="col-6">
<div class="card border-primary mb-3" style="max-width: 45rem;">
<div class="card text-white bg-primary mb-3" style="max-width: 45rem;">
  <div class="card-header">Produtos</div></div>
  <div class="card-body text-primary">
    <h5 class="card-title">Produtos da Lapcon</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="/produtos"><i class="fa fa-edit"aria-hidden="true"></i></a>
  </div>
</div>
</div>

<div class="col-6">
<div class="card border-info mb-3" style="max-width: 45rem;">
<div class="card text-white bg-info mb-3" style="max-width: 45rem;">
  <div class="card-header">Vendas</div></div>
  <div class="card-body text-info">
    <h5 class="card-title">Vendas da Lapcon</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="vendas"><i class="fa fa-edit"aria-hidden="true"></i></a>
  </div>
</div>
</div>

</div>
<div class="row">
<div class="col-6">
<div class="card border-success mb-3" style="max-width: 45rem;">
<div class="card text-white bg-success mb-3" style="max-width: 45rem;">
  <div class="card-header">Clientes</div></div>
  <div class="card-body text-success">
    <h5 class="card-title">Clientes da Lapcon</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a style="color:green;"href="/clientes"><i class="fa fa-edit"aria-hidden="true"></i></a>
  </div>
</div>
</div>


<div class="col-6">
<div class="card border-dark mb-3" style="max-width: 45rem;">
<div class="card text-white bg-dark mb-3" style="max-width: 45rem;">
  <div class="card-header">Categorias</div></div>
  <div class="card-body text-dark">
    <h5 class="card-title">veja as categorias dos produtos</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a style="color:black;"href="/categorias"><i class="fa fa-edit"aria-hidden=""></i></a>
  </div>
</div>
</div>

</div>
</div>
</div>
<footer color="black">
        <p>© 2017 Company, Inc. · <a href="">Privacidade</a> · <a href="">Termos</a></p>
      </footer>

    </div><!-- /.container -->

@endsection
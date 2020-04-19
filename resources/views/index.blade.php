@extends('layout.app', ["current" => "home"])

@section('body')
<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="imagens/notephoto.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              
            </div>
          </div>
        </div>
     <!--   <div class="item">
          <img class="second-slide" src="imagens/notephoto.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="imagens/notephoto.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
             
            </div>
          </div>
        </div>
      </div>-->
      <a class="left carousel-control"  role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control"  role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    
    
       
      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette" id="sobre">
        <div class="col-md-7">
          <h2 class="featurette-heading"> <span class="text-muted">Sobre</span></h2>
          <p class="lead"><p>Devido a grande procura de empresas que possuem  mão de obra para reparos e ajustes de noteboos a lapcom investiu nesse exito e é especialidade no mercado.</p>
      
      <p>
      È uma empresa focada em atendimento ao cliente voltada a assistencia técnica de notebooks em geral.
      </p>
      <p>
      Ela visa também em vendas de notebooks,celulares,tablets e acessórios de alta qualidade.
      </p>
      <p>
      possuimos tambem atendimento online via chat e tambem via email.Possuimos uma infraestrutura de qualidade oferecendo mais qualidade possivel para o cliente .temos tambem a ISO xxxxxx e ISO yyyyyyy de qualidade e segurança.
      </p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x400/auto" alt="500x400"  src="imagens/transdi.jpg"width="445" height="445">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading"> <span class="text-muted">Política</span></h2>
          <p class="lead"><p>
      È uma empresa focada em atendimento ao cliente voltada a assistencia técnica de notebooks em geral.
      </p>
      <p>
      Ela visa também em vendas de notebooks,celulares,tablets e acessórios de alta qualidade.
      </p>
      <p>
      possuimos tambem atendimento online via chat e tambem via email.Possuimos uma infraestrutura de qualidade oferecendo mais qualidade possivel para o cliente .temos tambem a ISO xxxxxx e ISO yyyyyyy de qualidade e segurança.
      </p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="500x500"  src="imagens/missao.png" width="425" height="425">
        </div>
      </div>

      
            

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


<!--<div class="jumbotron bg-light border border-secondary">
    <div class="row">
        <div class="card-deck">
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Cadastro de produtos</h5>
                    <p class="card=text">
                        Aqui você cadastra todos os seus produtos.
                        Só não se esqueça de cadastrar previamente as categorias
                    </p>
                    <a href="/produtos" class="btn btn-primary">Cadastre seus produtos</a>
                </div>
            </div>
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Cadastro de Categorias</h5>
                    <p class="card=text">
                        Cadastre as categorias dos seus produtos
                    </p>
                    <a href="/categorias" class="btn btn-primary">Cadastre suas categorias</a>
                </div>
            </div>            
        </div>
    </div>
</div>-->

<!-- FOOTER -->
<footer color="black">
        <p>© 2017 Company, Inc. · <a href="">Privacidade</a> · <a href="">Termos</a></p>
      </footer>

    </div><!-- /.container -->

@endsection
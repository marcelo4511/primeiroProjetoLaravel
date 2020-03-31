@extends('layout.app', ["current" => "contato"])

@section('body')


<div class="container">
          <div class="header clearfix">
              <h2>Contate-nos</h2><br>
            <p>Não tem tempo para falar agora?Nos envie um e-mail e em breve retornaremos</p>
          <div class= "jumbotron">
           
              <div class="form-group">
              
            <form class="form-horizontal" name="form" method="post"action="php/teste.php">
                <label>Nome completo *</label><br>
              <input type="text" name="nome" class="form-control" placeholder="Digite seu nome">
              <label>E-mail *</label><br>
              <input type="text" name="email" class="form-control" placeholder="Digite seu Email">
              <label>CPF *</label>
              <input type="text" name="cpf" class="form-control" placeholder="informe seu CPF">
             
              
              <h3>Detalhe da solicitação</h3><br>
              <label>Tipo de Solicitação *</label><br>
              <select class="form-control" name="solicitacao">
                <option>Selecione aqui</option>
              <option>Localização de Assistencia tecnica</option>
                <option>manuseio do produto</option>
                <option>peças ou acessórios</option>
                <option>reclamação</option>
                <option>Problemas no site</option>
                <option>Outros</option>
              </select>
              <label>Assunto *</label><br>
              <input type="text" name="assunto" class="form-control" placeholder="Informe aqui">
              <label for="comment"> Sua Mensagem *</label><br>
              <textarea class="form-control" rows="5" id="comment" name="mensagem"></textarea>
              <br>
              <input type="submit" id="sub"value="Enviar"class="btn btn-primary" onclick="formContato()">
      
				  </form>
        </div>
      </div>
    </div>
		  </div>
		  
               
                
           
       


@endsection
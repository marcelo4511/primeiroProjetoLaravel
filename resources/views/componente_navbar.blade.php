<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
          data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <a class="navbar-brand" href="{{ url('/') }}">
                    Sistema de vendas da Lapcom
                </a>
 
  <ul class="navbar-nav mr-auto">

  </ul>

  <div class=""id="navbar">
    <ul class="navbar-nav mr-auto">
      <li @if($current=="home") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/home">Home </a>
      </li>
      <li @if($current=="produtos") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/produtos">Produtos</a>
      </li>
     
      <li @if($current=="clientes") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/clientes">Clientes </a>
      </li>

      <li @if($current=="categorias") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/categorias">Categorias </a>
      </li>

      <li @if($current=="vendas") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/vendas">Vendas </a>
      </li>
      <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                    <li class="nav-item dropdown"sytle="width:1000px;">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                  
       </ul>
  </div>
</nav>
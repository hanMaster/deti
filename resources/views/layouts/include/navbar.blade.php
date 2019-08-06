        <nav class="navbar navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Давай поиграем">
                    
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    @guest
                    @else

                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}"
                          >Главная <span class="sr-only">(current)</span></a
                        >
                      </li>
                      <li class="nav-item dropdown">
                        <a
                          class="nav-link dropdown-toggle"
                          href="#"
                          id="dropdown01"
                          data-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                          >Справочники</a
                        >
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                          <a class="dropdown-item" href="{{ url('/clients') }}">Клиенты</a>
                          <a class="dropdown-item" href="{{ url('/services') }}">Услуги</a>
                          <a class="dropdown-item" href="{{ url('/goods') }}">Товары</a>
                          <a class="dropdown-item" href="{{ url('/abonements') }}">Абонементы</a>
                        </div>
                      </li>
                      <li class="nav-item dropdown">
                        <a
                          class="nav-link dropdown-toggle"
                          href="#"
                          id="dropdown02"
                          data-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                          >Товары</a
                        >
                        <div class="dropdown-menu" aria-labelledby="dropdown02">
                          <a class="dropdown-item" href="{{ url('/goodsin')}}">Приход</a>
                          <a class="dropdown-item" href="{{ url('/warehouse') }}">Остатки товаров</a>
                        </div>
                      </li>

                      <li class="nav-item"><a class="nav-link" href="/calendar">Календарь мероприятий</a></li>
                      @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                            </li>
                            {{-- <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li> --}}
                        @else




                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выход') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
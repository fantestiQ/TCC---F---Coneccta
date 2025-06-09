<div>
    <header>
        <div id="logo-container">
            <a href="{{ route('principal') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Coneccta">
            </a>
        </div>
            <nav class="position-absolute top-0 start-0 w-100">

            
                <div class="container d-flex justify-content-center align-items-center py-3">
                    {{-- Links à direita --}}
                    <ul class="d-flex mb-0 p-0 list-unstyled align-items-center">
                      @if ($userType === 'guest')
                        <li class="ms-4">
                            <a href="{{ route('principal') }}" class="nav-link">Principal</a>
                        </li>
                        <li class="ms-4">
                            <a href="{{ route('screen') }}" class="nav-link">Telas</a>
                        </li>
                        <li class="ms-4">
                            <a href="{{ route('vagas') }}" class="nav-link">Vagas disponíveis</a>
                        </li>
                        <li class="ms-4">
                            <a href="{{ route('login') }}" class="btn btn-light btn-sm">Login</a>
                        </li>

                        @elseif ($userType === 'candidato')
                        <li class="ms-4">
                            <a href="{{ route('principal') }}" class="nav-link">Principal</a>
                        </li>
                        <li class="ms-4">
                            <a href="{{ route('screen') }}" class="nav-link">Telas</a>
                        </li>
                        <li class="ms-4">
                            <a href="{{ route('candidato.vagas.disponiveis') }}" class="nav-link">Minhas Vagas</a>
                        </li>
                        <li class="ms-4">
                            <a href="{{ route('candidato.perfil') }}" class="nav-link">Meu Perfil</a>
                        </li>
                        <li>
                            <button type="button" wire:click="logout">
                                Logout {{ $userName }}
                            </button>
                        </li>

                        @elseif ($userType === 'empresa')
                        <li class="ms-4">
                            <a href="{{ route('principal') }}" class="nav-link">Principal</a>
                        </li>
                        <li class="ms-4">
                            <a href="{{ route('screen') }}" class="nav-link">Telas</a>
                        </li>
                        <li class="ms-4">
                            <a href="{{ route('empresa.dashboard') }}" class="nav-link">Dashboard</a>
                        </li>
                        <li class="ms-4">
                            <a href="{{ route('empresa.perfil') }}" class="nav-link">Perfil da Empresa</a>
                        </li>
                        <li class="ms-4">
                            <a href="{{ route('empresa.vagas.empresa') }}" class="nav-link">Vagas Públicas</a>
                        </li>
                        <li >
                            <button  type="button"  wire:click="logout">
                                Logout {{ $userName }}
                            </button>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
    </header>
</div>

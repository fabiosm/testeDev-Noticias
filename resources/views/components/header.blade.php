<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ asset('/') }}">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ asset('/') }}">
                        Exibir notícias
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('noticias.create') }}">
                        Cadastrar notícias
                    </a>
                </li>
            </ul>
            @if (!empty($categorias))
            <form class="d-flex" role="search">
                <input
                    class="form-control me-2"
                    type="search"
                    name="titulo"
                    placeholder="Pesquisar por título"
                    aria-label="Pesquisar"
                    value="{{app('request')->input('titulo')}}">
                <select class="form-select" name="categoria" id="categoria">
                    <option value="">Todas as categorias</option>
                @foreach ($categorias as $categoria)
                    @php $selected = (app('request')->input('categoria') == $categoria->id) ? 'selected' : ''; @endphp
                    <option {{ $selected }} value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
                </select>
                <button class="btn btn-outline-success" type="submit">Enviar</button>
            </form>
            @endif
        </div>
    </div>
</nav>
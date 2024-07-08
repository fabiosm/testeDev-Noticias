<x-layout title="Notícias" :mensagem-sucesso="$mensagemSucesso" :categorias="$categorias">
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($noticias as $noticia)
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $noticia->titulo }}</h5>
                        <p class="card-text">{{ $noticia->conteudo }}</p>
                        <a href="{{ route('noticias.show', $noticia->id) }}" class="btn btn-primary">
                            Visualizar
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</x-layout>


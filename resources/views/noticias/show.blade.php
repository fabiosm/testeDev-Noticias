<x-layout title="Notícia - {{$noticia->titulo}}">
    <div class="container">
        <div class="row">
            <div class="col">
                <h4>{{$noticia->titulo}}</h4>
                <span class="badge text-bg-info">{{$categoria->nome}}</span>
                <hr>
                <p>{{$noticia->conteudo}}</p>
                <small>Data de publicação: {{ date_format($noticia->created_at, "d/m/Y - H:i:s") }}</small>
            </div>
        </div>
    </div>
</x-layout>
<x-layout title="Criar notícias" :mensagem-sucesso="$mensagemSucesso">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-7 card">
                <div class="card-header">
                    Cadatrar nova notícia
                </div>
                <form action="{{ route('noticias.store') }}" method="post">
                    <div class="card-body">
                        @csrf
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" required class="form-control" id="titulo" name="titulo">
                        </div>
                        <div class="mb-3 row">
                            <fieldset class="form-group col-md-8">
                                <label for="categoria_id" class="form-label">Categoria</label>
                                <select class="form-select" required name="categoria_id">
                                    <option selected>Selecione a categoria</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                                </select>
                            </fieldset>
                            <fieldset class="form-group col-md-4">
                                <button type="button" class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#categoriaModal">
                                    <i class="bi bi-bookmark-plus"></i> Nova categoria
                                </button>
                            </fieldset>
                        </div>
                        <div class="mb-3">
                            <label for="conteudo" class="form-label">Conteúdo</label>
                            <textarea class="form-control" required id="conteudo" rows="3" name="conteudo"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="idUser" value='1' />
                        <button class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="categoriaModal" tabindex="-1" aria-labelledby="categoriaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('categorias.store') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="categoriaModalLabel">Cadastrar categoria</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" required class="form-control" id="categoria" name="categoria" placeholder="Informe a categoria">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fehcar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
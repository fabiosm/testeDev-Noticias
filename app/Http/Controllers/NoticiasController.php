<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticiasRequest;
use App\Models\Categorias;
use App\Models\Noticias;
use Exception;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    /**
     * Tela inicial de noticias
     */
    public function index(Request $request)
    {
        $noticias = Noticias::noticiasTelaInicial();

        if ($request->has('titulo') && !empty($request->titulo)) {
            $noticias->where('titulo', 'like', '%'.$request->titulo.'%');
        }

        if ($request->has('categoria') && !empty($request->categoria)) {
            $noticias->where('categoria_id', $request->categoria);
        }

        $noticias = $noticias->get();

        $categorias = Categorias::all();
        return view(
            'noticias.index',
            [
                'noticias' => $noticias,
                'categorias' => $categorias,
                'mensagemSucesso' => session('mensagem.sucesso')
            ]
        );
    }

    /**
     * Formulário de criação de noticias
     */
    public function create()
    {
        $categorias = Categorias::all();
        return view(
            'noticias.create',
            [
                'categorias' => $categorias,
                'mensagemSucesso' => session('mensagem.sucesso')
            ]
        );
    }

    /**
     * Cadastra uma nova notícia
     */
    public function store(NoticiasRequest $request)
    {
        try {
            Noticias::create($request->except('_token'));
            return to_route('noticias.index')
                ->with('mensagem.sucesso', "Notícia '{$request->titulo}' adicionada com sucesso");
        } catch (Exception $e) {
            return redirect()->back()->withErrors('Erro ao cadastrar categoria: ' . $e->getMessage());
        }
    }

    /**
     * Exibe notícia
     *
     * @param Noticias $noticia
     */
    public function show(Noticias $noticia)
    {
        $categoria = Categorias::find($noticia->categoria_id);
        return view('noticias.show', compact('noticia', 'categoria'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Exception;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Realiza o cadastro de uma nova categoria
     */
    public function store(Request $request)
    {
        if (empty($request->categoria)) {
            return redirect()->back()->withErrors('Categoria não informada.');
        }

        try {
            Categorias::create(['nome' => $request->categoria]);
            return to_route('noticias.create')
                ->with('mensagem.sucesso', "Categoria '{$request->categoria}' adicionada com sucesso");
        } catch (Exception $e) {
            return redirect()->back()->withErrors('Erro ao cadastrar categoria: ' . $e->getMessage());
        }
    }
}

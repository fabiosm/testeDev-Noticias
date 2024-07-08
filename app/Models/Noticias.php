<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Noticias extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'conteudo', 'categoria_id', 'idUser'];

    public function categoria()
    {
        return $this->belongsTo(Noticias::class, 'id', 'categoria_id');
    }

    /**
     * Exibe o conteúdo com o número de caracteres passado por paremtrro
     * @param int $caracteres Informa o numero de caracteres
     */
    protected static function noticiasTelaInicial(int $caracteres = 300)
    {
        return self::select(
            [
                'id',
                'titulo',
                DB::raw("IF (
                    CHAR_LENGTH(conteudo) > {$caracteres},
                    CONCAT(SUBSTRING(conteudo, 1, {$caracteres}), '...'),
                    conteudo
                ) AS conteudo")
            ]
        );
    }

    /**
    * Ordernar sempre as novas noticias primeiro
    */
    protected static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $queryBuilder) {
            $queryBuilder->orderBy('id', 'desc');
        });
    }
}

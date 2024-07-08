<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];
    protected $primaryKey = 'id';

    public function noticias()
    {
        return $this->hasMany(Noticias::class, 'categoria_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_completo',
        'cpf',
        'email',
        'telefone',
        'cep',
        'logradouro',
        'bairro',
        'cidade',
        'estado',
    ];
}

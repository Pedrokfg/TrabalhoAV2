<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tab extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'sobrenome',
        'cpf',
        'nasc',
        'email',
        'telefoneP',
        'telefoneS',
        'rg',
        'orgE',
        'valor',
        'numeroRes',
        'complemento',
        'logradouro',
        'bairro',
        'cidade',
        'uf'
    ];

    protected $casts = [
        'cpf' => 'int',
        'nasc' => 'date',
        'telefoneP' => 'int',
        'telefoneS' => 'int',
        'rg' => 'int',
        'valor' => 'int',
        'numeroRes' => 'int',
    ];

    protected $table = "tab";
}
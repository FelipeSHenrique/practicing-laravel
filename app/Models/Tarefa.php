<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    // protected $table = 'tarefas'; // Caso o nome da tabela seja diferente, pode especificar aqui
    // protected $primaryKey = 'id'; // Nome da minha chave primaria
    // public $incrementing = false; // Vai especificar se minha chave é autoincremente, por padrão é true
    // protected $keyType = 'string'; // Eu posso dizer qual campo que ele é, nesse caso por padrão é inteiro

    public $timestamps = false;

    protected $fillable = ['titulo'];
}

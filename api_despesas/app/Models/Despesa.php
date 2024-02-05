<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    use HasFactory;

    protected $table = 'despesas';
    
    protected $fillable = [
        'descricao',
        'data',
        'id_usuario',
        'valor'
    ];

    //Retorna o usuário que é dono da despesa.
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

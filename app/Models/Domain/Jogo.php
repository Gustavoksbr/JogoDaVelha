<?php

namespace App\Models\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;
    protected $fillable = ['conteudo','jogador1id','jogador2id','jogador1lado','jogador2lado','salaid','proximavez','resultado','atual'];
    // public function sala()
    // {
    //     return $this->belongsTo(Sala::class);
    // }
}

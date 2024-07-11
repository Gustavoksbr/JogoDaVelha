<?php

namespace App\Models\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;
    protected $fillable = ['nome','senha','donoid','jogador2id'];
    // public function jogos()
    // {
    //     return $this->hasMany(Jogo::class);
    // }
}

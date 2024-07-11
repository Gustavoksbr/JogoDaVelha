<?php

namespace App\Models\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revanche extends Model
{
    use HasFactory;
    protected $fillable = ['jogador_pedindo_id','jogador_recebendo_id','salaid'];
}

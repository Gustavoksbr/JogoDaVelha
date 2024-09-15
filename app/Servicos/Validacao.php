<?php

namespace App\Servicos;

use App\Models\DAO\SalaDAO;
use App\Models\DAO\JogoDAO;
use Illuminate\Support\Facades\Auth;



class Validacao
{

    public string $atributoteste = 'abc';

    public static function conferirDisponibilidade($id)
    {
        $mensagem = null;
        $sala = $sala = SalaDAO::find('id', $id);
        if ($sala->jogador2id != null) {
            if ((Auth::user()->id == $sala->donoid) || (Auth::user()->id == $sala->jogador2id)) {
                $mensagem = "Você está na sala";
            } else {
                $mensagem="Esta sala já está cheia";
    
            }
        } else {
            // dd('Sala disponível, você pode entrar');
            $mensagem="Sala diponivel";
        }
        return $mensagem;
    }
}
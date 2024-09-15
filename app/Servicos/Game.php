<?php

namespace App\Servicos;
use App\Models\DAO\JogoDAO;
use App\Models\DAO\SalaDAO;
use App\Models\Domain\Sala;
use Illuminate\Support\Facades\Auth;



class Game
{
    public string $atributoteste = 'abc';

    public static function IniciarJogo(Sala $sala)
    {
        $randomNumber = rand(0, 1);
        $jogador1id = $sala->donoid;
        $jogador2id = Auth::user()->id;
        $jogador1lado = ($randomNumber === 0) ? 'x' : 'o';
        if ($jogador1lado == 'x') {
            $jogador2lado = 'o';
            $primeiravez = $jogador1id;
        } else if ($jogador1lado == 'o') {
            $jogador2lado = 'x';

            $primeiravez = $jogador2id;
        }
        $jogo = (object) [
            'conteudo' => '_________',
            'jogador1id' => $sala->donoid,
            'jogador2id' => $jogador2id,
            'jogador1lado' => $jogador1lado,
            'jogador2lado' => $jogador2lado,
            'salaid' => $sala->id,
            'proximavez' => $primeiravez,
            'resultado' => null,
            'atual' => true
        ];
        JogoDAO::create($jogo);
        SalaDAO::update($sala, 'jogador2id', $jogador2id);
    }
    public static function ConferirPossivelResultado($pgn)
    {

        $conteudo = str_split($pgn);
        $resultado = null;
        $resultadopossivel = null;
        $resultadospossiveis =
            [
                [0, 1, 2],
                [3, 4, 5],
                [6, 7, 8],
                [0, 3, 6],
                [1, 4, 7],
                [2, 5, 8],
                [0, 4, 8],
                [2, 4, 6]
            ];
        $lances = ['x', 'o'];
        foreach ($lances as $p1 => $a)
        //p1 = posicao de 'x' e 'o' em $lances
        //a = o valor do elemento dado pela posicao
        {
            foreach ($resultadospossiveis as $p2 => $b) {
                foreach ($b as $p3 => $c) {
                    if ($conteudo[$c] == $a) {
                        $resultadopossivel .= strval($c);

                        if ((strlen($resultadopossivel) == 3)) {
                            $convertido = str_split($resultadopossivel);
                            echo $convertido[0];
                            echo $convertido[1];
                            echo $convertido[2];
                            if (in_array($convertido, $resultadospossiveis)) {
                                $resultado = "vitoria para $a";
                                break 3;
                            } 
                        }
                    }
                }
                $resultadopossivel = '';
            }
        }
        if (!in_array('_', $conteudo) && $resultado == null) {
            $resultado = 'empate';
        }
        return $resultado;
    }
}
            
            
            

//  $joguin= 'xxoooxoxx';
// $joguin= 'xxoooo___';
// if(Game::ConferirPossivelResultado($joguin) == null)
// {
//     echo "\n"."nulo";
// }
// else{
//  echo "\n". Game::ConferirPossivelResultado($joguin);
// }
